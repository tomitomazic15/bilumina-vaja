<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<link rel="stylesheet" href="style.css" type="text/css">
</head>
<body>
<?php

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_PORT => "8080",
  CURLOPT_URL => "http://178.238.238.202:8080/Skulptur.WebService/rest/pos/saleTest",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS => "sessionUser=MOB%401569393888961&saleType=SALE_DATE_PART_01&showPartners=1&showEURValues=1&showTaxValues=0",
  CURLOPT_HTTPHEADER => array(
    "cache-control: no-cache",
    "content-type: application/x-www-form-urlencoded",
    "postman-token: 9aae0a73-4177-8840-ac83-00cc272814a1"
  ),
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

$data = json_decode($response, true);
$temp = "<div><table>";

$temp .= "<tr><th>Datum</th>";
$temp .= "<th>Naziv poslovalnice</th>";
$temp .= "<th>Vrednost prodaje</th>";

for($i = 0; $i < sizeof($data["items"]); $i++) {
    $temp .= "<tr>";
    $temp .= "<td>" . $data["items"][$i]["DATEDOCUMENT"] . "</td>";
    $temp .= "<td>" . $data["items"][$i]["PART_TITLESMALL"] . "</td>";
    $temp .= "<td>" . $data["items"][$i]["SALEVALUE"] . "</td>";
    $temp .= "</tr>";
}

$temp .= "</table></div>";

echo $temp;

?> 
<div class="right">
<table>
    <tr>
        <th>Vrednost prodaje SUM po datumu</th>
    </tr>
    <tr>
        <td>2020-01-13: 6,978.47</td>
    </tr>
    <tr>
        <td>2020-01-12: 3893.37</td>
    </tr>
    <tr>
        <td>2020-01-11: 10830.56</td>
    </tr>
    <tr>
        <td>2020-01-10: 8261.99</td>
    </tr>
    <tr>
        <td>2020-01-09: 6269.81</td>
    </tr>
    <tr>
        <td>2020-01-08: 6,596.4</td>
    </tr>
    <tr>
        <td>2020-01-07: 5,782.56</td>
    </tr>
    <tr>
        <td>2020-01-06: 7,601.57</td>
    </tr>
    <tr>
        <td>2020-01-05: 3823.68</td>
    </tr>
    <tr>
        <td>2020-01-04: 10,429.1</td>
    </tr>
    <tr>
        <td>2020-01-03: 9039.74</td>
    </tr>
    <tr>
        <td>2020-01-02: 153.08</td>
    </tr>
</table>
</body>
</html>