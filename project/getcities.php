<?php
$q=$_REQUEST["q"];
require_once 'vendor/autoload.php';
use Nahid\JsonQ\Jsonq;
$query = new Jsonq('countries.json');
//$q1 = new Jsonq('countries.json');
$res = $query->from($q)->get();
$cities_size = count($res);

?>
<label for="cities">city:</label>
    <select class="form-control" id="cities" name="cities">

     <?php for ($x = 0; $x < $cities_size; $x++)
{
?>
  <option value="<?php echo $res[$x]; ?>"><?php echo $res[$x]; ?></option>
 

<?php } ?>
</select>