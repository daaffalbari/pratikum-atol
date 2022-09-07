<?php include_once("functions.php");?>
<?php 
$db = dbConnect();
if($db->connect_errno==0)
{
    if(isset($_POST["btnLogin"])) 
    {
        $id_pegawai=$db->escape_string($_POST["id_pegawai"]);
        $pass=$db->escape_string($_POST["pass"]);
        $sql="SELECT id_pegawai, nama FROM ms_pegawai
                WHERE id_pegawai='$id_pegawai' AND pass=password('$pass')";
        $res = $db->query($sql);
        if($res)
        {
            if($res->num_rows==1)
            {
                $data=$res->fetch_assoc();
                session_start();
                $_SESSION["id_pegawai"]=$data["id_pegawai"];
                $_SESSION["nama"]=$data["nama"];        
                header("Location: menu-dashboard.php");
            }
            else 
                header("Location: index.php?error=1");
        }                
    }
    else
        header("Location: index.php?error=2");
}
else 
    header("Location: index.php?error=3");
?>