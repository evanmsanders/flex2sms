<table class="table table-striped">
    <thead>
        <tr>
<?php 
foreach($message['Message'] as $key=>$value) {
    echo("<td>".ucwords($key)."</td>");
}
?>
        </tr>
    </thead>
    <tbody>
        <tr>
            
<?php 
foreach($message['Message'] as $value) {
    echo("<td>$value</td>");
}
?>
        </tr>
    </tbody>
</table>