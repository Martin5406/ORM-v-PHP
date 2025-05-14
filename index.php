<?php
require 'bootstrap.php';

use Models\VehicleModel;
use Models\Car;

$manufacturerName = $_GET['manufacturer'] ?? null;
$modelName = $_GET['model'] ?? null;

$query = VehicleModel::with('manufacturer');

if ($manufacturerName) {
    $query->whereHas('manufacturer', fn($q) => $q->where('manufacturer_name', $manufacturerName));
}
if ($modelName) {
    $query->where('model_name', $modelName);
}

$models = $query->get();

echo "<h1>Modely vozidel</h1>";
echo "<form method='GET'>
    <label>Výrobce: <input type='text' name='manufacturer' value='" . htmlspecialchars($manufacturerName) . "'></label>
    <label>Model: <input type='text' name='model' value='" . htmlspecialchars($modelName) . "'></label>
    <button type='submit'>Filtrovat</button>
</form>";

echo "<table border='1'><tr><th>Model</th><th>Výrobce</th></tr>";
foreach ($models as $model) {
    echo "<tr><td>{$model->model_name}</td><td>{$model->manufacturer->manufacturer_name}</td></tr>";
}
echo "</table>";

$cars = Car::with(['model.manufacturer', 'owner'])->get();

echo "<h2>Seznam vozidel s majiteli</h2>";
echo "<table border='1'><tr><th>VIN</th><th>Model</th><th>Výrobce</th><th>Majitel</th></tr>";
foreach ($cars as $car) {
    $ownerName = $car->owner ? "{$car->owner->first_name} {$car->owner->last_name}" : 'Neznámý';
    echo "<tr><td>{$car->vin_code}</td><td>{$car->model->model_name}</td><td>{$car->model->manufacturer->manufacturer_name}</td><td>{$ownerName}</td></tr>";
}
echo "</table>";
