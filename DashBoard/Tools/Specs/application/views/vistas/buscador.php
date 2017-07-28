<form action="<?php echo site_url('controlador2/search_keyword');?>" method = "post">
<input type="text" name = "keyword" />
<input type="submit" value = "Search" />
</form>



foreach($results as $row){
<table>
    <tr>
        <td><?php echo $row->id_user ?></td>
        <td><?php echo $row->Mercado ?></td>
        <td><?php echo $row->Sitio ?></td>
        <td><?php echo $row->Banner ?></td>
        <td><?php echo $row->Size ?></td>
        <td><?php echo $row->Formato ?></td>
        <td><?php echo $row->Weight ?></td>
        <td><?php echo $row->ClickTag ?></td>
        <td><?php echo $row->Observaciones ?></td>
        <td><a href="'<?php echo $row->Observaciones. ?>'"><center>Clic aqui</center></a></td>
        <!--<td><?php echo $row->EmailAddress ?></td>-->
    </tr>
</table>
}












</body>
</html> 


