<?php

//Kafijas aparāts
//Maks, kurā atrodas MONĒTAS
//
//sākumā iemetam monētas
//iemest - 0.10 - 1 monēta, 0.03 - neeksistē, 0.02 - 1 monēta = 0.12
//izvēlas dzērienu
//izdod atlikumu sākot no lielākās iespējamās monētas

$wallet = [
    1 => 10,
    2 => 1,
    5 => 10,
    10 => 10,
    20 => 10,
    50 => 10,
    100 => 10
];

system("clear");

$drinks = [
    'coffee' => 187,
    'tea' => 144,
    'gatorade' => 200
];

echo "Choose your drink: " . PHP_EOL;
foreach ($drinks as $drink => $price) {
    echo $drink . PHP_EOL;
}
$chooseDrink = readline("> ");
$drinkPrice = $drinks[$chooseDrink];
echo "price is $drinkPrice" . PHP_EOL;
$inserted = 0;

while (true) {
    $insertCoin = readline("Insert coin: ");
    if ($insertCoin === 'buy') {
        if ($drinkPrice <= $inserted) {
            system('clear');
            echo "You have enough coin for this drink" . PHP_EOL;
            $change = $inserted - $drinkPrice;
            break;
        } else {
            echo "Not enough minerals!" . PHP_EOL;
            continue;
        }
    }
    if (!isset($wallet[$insertCoin])) {
        echo "No such coin!" . PHP_EOL;
        continue;
    }
    if ($wallet[$insertCoin] === 0) {
        echo "You don't have this coin!" . PHP_EOL;
        continue;
    }
    system("clear");
    $inserted = $insertCoin + $inserted;
    $wallet[$insertCoin] -= 1;
    echo "You chose $chooseDrink, price is $drinkPrice" . PHP_EOL;
    echo "Inserted total: $inserted" . PHP_EOL;
    echo "Wallet status:" . PHP_EOL;
    foreach ($wallet as $coin => $count) {
        echo "$coin cents = $count pcs" . PHP_EOL;
    }
}

echo "You have $change cents for change" . PHP_EOL;
$coins = [100, 50, 20, 10, 5, 2, 1];

echo "Here's your change: " . PHP_EOL;
while ($change > 0) {
    for ($i = 0; $i < count($coins); $i++) {
        if (intdiv($change, $coins[$i] > 0)){
            echo $coins[$i] . " cents = " . (intdiv($change, $coins[$i])) . PHP_EOL;
            $change = $change - ((intdiv($change, $coins[$i])) * $coins[$i]);
        }
    }
}

