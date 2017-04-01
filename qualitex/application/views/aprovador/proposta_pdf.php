<style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 20px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 20px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;}
.tg .tg-zxef{font-weight:bold;font-size:20px;background-color:#67fd9a;text-align:center;vertical-align:top}
.tg .tg-erlg{font-weight:bold;background-color:#efefef;vertical-align:top}
.tg .tg-rkwu{font-family:"Courier New", Courier, monospace !important;;vertical-align:top}
.tg .tg-yw4l{vertical-align:top}
.tg .tg-19gn{font-weight:bold;font-family:Arial, Helvetica, sans-serif !important;;background-color:#c0c0c0;text-align:center;vertical-align:top}
.tg .tg-19wq{font-family:Arial, Helvetica, sans-serif !important;;background-color:#c0c0c0;text-align:center;vertical-align:top}
.tg .tg-u1yq{font-weight:bold;background-color:#c0c0c0;text-align:center;vertical-align:top}
</style>
<table class="tg">
  <tr>
    <th class="tg-zxef" colspan="5">Qualitex E.S.®</th>
  </tr>
  <tr>
    <td class="tg-yw4l" colspan="5"></td>
  </tr>
  <tr>
    <td class="tg-19wq" colspan="5">Rodovia Divaldo Suruagy, Km 12 - Distrito Industrial José Aprígio Vilela, Mal. Deodoro - AL, 57160-000
Fone:(82) 3036-1750</td>
  </tr>
  <tr>
    <td class="tg-yw4l" colspan="5"></td>
  </tr>
  <tr>
    <td class="tg-19gn" colspan="5">PROPOSTA</td>
  </tr>
  <tr>
    <td class="tg-yw4l" colspan="5"></td>
  </tr>
  <tr>
    <td class="tg-rkwu">Titulo:</td>
    <td class="tg-yw4l" colspan="4"><?php echo $proposta[0]['descricao']; ?></td>
  </tr>
  <tr>
    <td class="tg-rkwu">Gerada por:</td>
    <td class="tg-yw4l" colspan="4"><?php echo $usuario; ?></td>
  </tr>
  <tr>
    <td class="tg-rkwu">Data de criação:</td>
    <td class="tg-yw4l" colspan="4"><?php echo $proposta[0]['data_criacao']; ?></td>
  </tr>
  <tr>
    <td class="tg-yw4l" colspan="5"></td>
  </tr>
  <tr>
  </tr>
  <tr>
    <td class="tg-19gn" colspan="5">SERVIÇOS</td>
  </tr>
  <tr>
    <td class="tg-yw4l" colspan="5"></td>
  </tr>
  <tr>
    <td class="tg-erlg">Nome</td>
    <td class="tg-erlg" colspan="3">Descrição</td>
    <td class="tg-erlg">Valor do serviço</td>
  </tr>
  
  <?php
  $valor_total = 0;
  foreach ($servicos as $key => $value) :   ?>
  
    <tr>
      <td class="tg-yw4l"><?php echo $value['nome']; ?></td>
      <td class="tg-yw4l" colspan="3"><?php echo $value['descricao']; ?></td>
      <td class="tg-yw4l">R$ <?php echo $value['valor']; ?></td>
    </tr>

  <?php 
    $valor_total += $value['valor'];   
    endforeach; 
  ?>

  <!-- <tr>
    <td class="tg-yw4l">Serviço 123</td>
    <td class="tg-yw4l" colspan="3">Urem ipsum Urem ipsumurem ipsum urem ipsumurem ipsum urem ipsumurem ipsum</td>
    <td class="tg-yw4l">R$ 900,00</td>
  </tr> -->
  <tr>
    <td class="tg-yw4l" colspan="5"></td>
  </tr>
  <tr>
  </tr>
  <tr>
    <td class="tg-yw4l">Valor Total</td>
    <td class="tg-yw4l" colspan="4">R$ <?php echo $valor_total; ?></td>
  </tr>
  <tr>
    <td class="tg-yw4l">Status Atual:</td>
    <td class="tg-yw4l" colspan="4"><?php echo strtoupper($proposta[0]['status']); ?></td>
  </tr>
  <tr>
    <td class="tg-yw4l" colspan="5"></td>
  </tr>
</table>