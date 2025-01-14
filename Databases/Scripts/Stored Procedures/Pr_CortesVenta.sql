USE [galerasw_galeras]
GO
CREATE PROCEDURE [dbo].[Pr_CortesVenta]
@FechaInicial As DateTime,
@FechaFinal   As DateTime
As
Begin
  Declare @consulta As NVarChar(4000);

  Set @consulta = 'Select id_tickets, total, fecha_pago_final, pagado, nombre_empleado, id_mesas, nombre_sesion, facturado 
                   From dbo.tickets
                   Inner Join dbo.empleados ON fk_id_empleados = id_empleado
                   Inner Join dbo.mesas ON fk_id_mesas = id_mesas
                   Inner Join dbo.cuentas ON fk_id_cuentas_t = id_cuenta';

  If @FechaInicial <> ''
    Begin
      Set @consulta = @consulta + ' Where fecha_pago_final >= Convert(Date, @FechaInicial)';
      If @FechaFinal <> ''
      Begin
        Set @consulta = @consulta + ' And fecha_pago_final <= Convert(Date, @FechaFinal)';
      End;
     End;
  Else
  Begin
    Set @consulta = @consulta + ' Where fecha_pago_final <= Convert(Date, @FechaFinal)';
  End

  Exec sp_executesql @consulta, N'@FechaInicial DateTime, @FechaFinal DateTime', @FechaInicial, @FechaFinal;
End;


