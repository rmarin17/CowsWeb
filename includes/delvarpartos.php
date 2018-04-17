<?php 
if(isset($_POST['borrar'])){
    include 'conexion.php';
    
        if(empty($_POST['eliminar'])){
            print '<script language="JavaScript">'; 
            print 'alert("No se ha seleccionado ningun registro");';                                            
            print '</script>'; 
        } else{
            foreach($_POST['eliminar'] as $id_borrar){
                $sql = "DELETE from partos WHERE idp='$id_borrar'";
                $res = mysqli_query($conn,$sql);                                        
                }
                if($res){
                    print '<script language="JavaScript">'; 
                    print 'alert("Registros Eliminados Correctamente");';     
                    print "window.history.go(-1);";                                      
                    print '</script>'; 
                    
                }else{
                    print '<script language="JavaScript">'; 
                    print 'alert("NO SE PUEDO COMPLETAR LA ACCION");';    
                    print "window.history.go(-1);";                               
                    print '</script>'; 
                   
            }
            exit();
        }
    }?>