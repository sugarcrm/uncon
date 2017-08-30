<?php
if (!defined('sugarEntry') || !sugarEntry) die('Not A Valid Entry Point');

$productCategories = array(
    array(
        'name' => 'Hero',
        'list_order' => 1
    ),
    array(
        'name' => 'Villain',
        'list_order' => 2
    ),
    array(
        'name' => 'City Property',
        'list_order' => 3
    ),
    array(
        'name' => 'Personal Property',
        'list_order' => 4
    ),
);
$catIds = array();

$productTypes = array(
    array(
        'name' => 'Labor',
        'list_order' => 1
    ),
    array(
        'name' => 'Property',
        'list_order' => 2
    ),
);
$typeIds = array();

$productTemplates = array(
    array(
        'name' => 'Prof. M.',
        'cost_price' => '50.00',
        'cost_usdollar' => '50.00',
        'discount_price' => '100.00',
        'discount_usdollar' => '100.00',
        'list_price' => '100.00',
        'list_usdollar' => '100.00',
        'type' => 'Labor',
        'category' => 'Hero'
    ),
    array(
        'name' => 'Tails Teleporterson',
        'cost_price' => '50.00',
        'cost_usdollar' => '50.00',
        'discount_price' => '100.00',
        'discount_usdollar' => '100.00',
        'list_price' => '100.00',
        'list_usdollar' => '100.00',
        'type' => 'Labor',
        'category' => 'Hero'
    ),
    array(
        'name' => 'BladeFingers McBadger',
        'cost_price' => '50.00',
        'cost_usdollar' => '50.00',
        'discount_price' => '100.00',
        'discount_usdollar' => '100.00',
        'list_price' => '100.00',
        'list_usdollar' => '100.00',
        'type' => 'Labor',
        'category' => 'Hero'
    ),
    array(
        'name' => 'Wink Blinker',
        'cost_price' => '50.00',
        'cost_usdollar' => '50.00',
        'discount_price' => '100.00',
        'discount_usdollar' => '100.00',
        'list_price' => '100.00',
        'list_usdollar' => '100.00',
        'type' => 'Labor',
        'category' => 'Hero'
    ),
    array(
        'name' => 'Creole Cardflinger',
        'cost_price' => '50.00',
        'cost_usdollar' => '50.00',
        'discount_price' => '100.00',
        'discount_usdollar' => '100.00',
        'list_price' => '100.00',
        'list_usdollar' => '100.00',
        'type' => 'Labor',
        'category' => 'Hero'
    ),
    array(
        'name' => 'Windy Lightening',
        'cost_price' => '50.00',
        'cost_usdollar' => '50.00',
        'discount_price' => '100.00',
        'discount_usdollar' => '100.00',
        'list_price' => '100.00',
        'list_usdollar' => '100.00',
        'type' => 'Labor',
        'category' => 'Hero'
    ),
    array(
        'name' => 'Blue Jumpy Hairball',
        'cost_price' => '50.00',
        'cost_usdollar' => '50.00',
        'discount_price' => '100.00',
        'discount_usdollar' => '100.00',
        'list_price' => '100.00',
        'list_usdollar' => '100.00',
        'type' => 'Labor',
        'category' => 'Hero'
    ),
    array(
        'name' => 'Dr. Magnetism',
        'cost_price' => '50.00',
        'cost_usdollar' => '50.00',
        'discount_price' => '100.00',
        'discount_usdollar' => '100.00',
        'list_price' => '100.00',
        'list_usdollar' => '100.00',
        'type' => 'Labor',
        'category' => 'Villain'
    ),
    array(
        'name' => 'CouldBeAnyone Woman',
        'cost_price' => '50.00',
        'cost_usdollar' => '50.00',
        'discount_price' => '100.00',
        'discount_usdollar' => '100.00',
        'list_price' => '100.00',
        'list_usdollar' => '100.00',
        'type' => 'Labor',
        'category' => 'Villain'
    ),
    array(
        'name' => 'Lady BladeFingers McBadger',
        'cost_price' => '50.00',
        'cost_usdollar' => '50.00',
        'discount_price' => '100.00',
        'discount_usdollar' => '100.00',
        'list_price' => '100.00',
        'list_usdollar' => '100.00',
        'type' => 'Labor',
        'category' => 'Villain'
    ),
    array(
        'name' => 'Chief Runs-Through-Doors',
        'cost_price' => '50.00',
        'cost_usdollar' => '50.00',
        'discount_price' => '100.00',
        'discount_usdollar' => '100.00',
        'list_price' => '100.00',
        'list_usdollar' => '100.00',
        'type' => 'Labor',
        'category' => 'Villain'
    ),
    array(
        'name' => 'SFA Dev Team',
        'cost_price' => '100000.00',
        'cost_usdollar' => '100000.00',
        'discount_price' => '5000000.00',
        'discount_usdollar' => '5000000.00',
        'list_price' => '5000000.00',
        'list_usdollar' => '5000000.00',
        'type' => 'Labor',
        'category' => 'Hero'
    ),
    array(
        'name' => 'Building - City (Small)',
        'cost_price' => '100000.00',
        'cost_usdollar' => '100000.00',
        'discount_price' => '250000.00',
        'discount_usdollar' => '250000.00',
        'list_price' => '250000.00',
        'list_usdollar' => '250000.00',
        'type' => 'Property',
        'category' => 'City Property'
    ),
    array(
        'name' => 'Building - City (Medium)',
        'cost_price' => '300000.00',
        'cost_usdollar' => '300000.00',
        'discount_price' => '450000.00',
        'discount_usdollar' => '450000.00',
        'list_price' => '450000.00',
        'list_usdollar' => '450000.00',
        'type' => 'Property',
        'category' => 'City Property'
    ),
    array(
        'name' => 'Building - City (Large)',
        'cost_price' => '500000.00',
        'cost_usdollar' => '500000.00',
        'discount_price' => '750000.00',
        'discount_usdollar' => '750000.00',
        'list_price' => '750000.00',
        'list_usdollar' => '750000.00',
        'type' => 'Property',
        'category' => 'City Property'
    ),
    array(
        'name' => 'Building 1-5 Stories',
        'cost_price' => '100000.00',
        'cost_usdollar' => '100000.00',
        'discount_price' => '250000.00',
        'discount_usdollar' => '250000.00',
        'list_price' => '250000.00',
        'list_usdollar' => '250000.00',
        'type' => 'Property',
        'category' => 'Personal Property'
    ),
    array(
        'name' => 'Building 6-10 Stories',
        'cost_price' => '400000.00',
        'cost_usdollar' => '400000.00',
        'discount_price' => '750000.00',
        'discount_usdollar' => '750000.00',
        'list_price' => '750000.00',
        'list_usdollar' => '750000.00',
        'type' => 'Property',
        'category' => 'Personal Property'
    ),
    array(
        'name' => 'Building 11-20 Stories',
        'cost_price' => '1000000.00',
        'cost_usdollar' => '1000000.00',
        'discount_price' => '2000000.00',
        'discount_usdollar' => '2000000.00',
        'list_price' => '2000000.00',
        'list_usdollar' => '2000000.00',
        'type' => 'Property',
        'category' => 'Personal Property'
    ),
    array(
        'name' => 'Building 21-30 Stories',
        'cost_price' => '5000000.00',
        'cost_usdollar' => '5000000.00',
        'discount_price' => '100000000.00',
        'discount_usdollar' => '100000000.00',
        'list_price' => '100000000.00',
        'list_usdollar' => '100000000.00',
        'type' => 'Property',
        'category' => 'Personal Property'
    ),
    array(
        'name' => 'Vehicle - Police Car',
        'cost_price' => '20000.00',
        'cost_usdollar' => '20000.00',
        'discount_price' => '35000.00',
        'discount_usdollar' => '35000.00',
        'list_price' => '35000.00',
        'list_usdollar' => '35000.00',
        'type' => 'Property',
        'category' => 'City Property'
    ),
    array(
        'name' => 'Vehicle - Firetruck',
        'cost_price' => '150000.00',
        'cost_usdollar' => '150000.00',
        'discount_price' => '300000.00',
        'discount_usdollar' => '300000.00',
        'list_price' => '300000.00',
        'list_usdollar' => '300000.00',
        'type' => 'Property',
        'category' => 'City Property'
    ),
    array(
        'name' => 'Vehicle - Ambulance',
        'cost_price' => '150000.00',
        'cost_usdollar' => '150000.00',
        'discount_price' => '300000.00',
        'discount_usdollar' => '300000.00',
        'list_price' => '300000.00',
        'list_usdollar' => '300000.00',
        'type' => 'Property',
        'category' => 'City Property'
    ),
    array(
        'name' => 'Vehicle - Compact Car',
        'cost_price' => '7000.00',
        'cost_usdollar' => '7000.00',
        'discount_price' => '15000.00',
        'discount_usdollar' => '15000.00',
        'list_price' => '15000.00',
        'list_usdollar' => '15000.00',
        'type' => 'Property',
        'category' => 'Personal Property'
    ),
    array(
        'name' => 'Vehicle - Mid-Sized Car',
        'cost_price' => '12000.00',
        'cost_usdollar' => '12000.00',
        'discount_price' => '20000.00',
        'discount_usdollar' => '20000.00',
        'list_price' => '20000.00',
        'list_usdollar' => '20000.00',
        'type' => 'Property',
        'category' => 'Personal Property'
    ),
    array(
        'name' => 'Vehicle - Luxury Car',
        'cost_price' => '20000.00',
        'cost_usdollar' => '20000.00',
        'discount_price' => '45000.00',
        'discount_usdollar' => '45000.00',
        'list_price' => '45000.00',
        'list_usdollar' => '45000.00',
        'type' => 'Property',
        'category' => 'Personal Property'
    ),
    array(
        'name' => 'Street Light',
        'cost_price' => '500.00',
        'cost_usdollar' => '500.00',
        'discount_price' => '5000.00',
        'discount_usdollar' => '5000.00',
        'list_price' => '5000.00',
        'list_usdollar' => '5000.00',
        'type' => 'Property',
        'category' => 'City Property'
    ),
    array(
        'name' => 'Mail Box',
        'cost_price' => '100.00',
        'cost_usdollar' => '100.00',
        'discount_price' => '500.00',
        'discount_usdollar' => '500.00',
        'list_price' => '500.00',
        'list_usdollar' => '500.00',
        'type' => 'Property',
        'category' => 'City Property'
    ),
    array(
        'name' => 'Parking Meter',
        'cost_price' => '250.00',
        'cost_usdollar' => '250.00',
        'discount_price' => '1500.00',
        'discount_usdollar' => '1500.00',
        'list_price' => '1500.00',
        'list_usdollar' => '1500.00',
        'type' => 'Property',
        'category' => 'City Property'
    ),
);

// insert categories
foreach($productCategories as $cat) {
    $bean = BeanFactory::newBean('ProductCategories');
    $bean->name = $cat['name'];
    $bean->list_order = $cat['list_order'];
    $bean->save();

    $catIds[$cat['name']] = $bean->id;
}

// insert types
foreach($productTypes as $type) {
    $bean = BeanFactory::newBean('ProductTypes');
    $bean->name = $type['name'];
    $bean->list_order = $type['list_order'];
    $bean->save();

    $typeIds[$type['name']] = $bean->id;
}

// insert templates
foreach($productTemplates as $prod) {
    $bean = BeanFactory::newBean('ProductTemplates');
    $bean->name = $prod['name'];
    $bean->cost_price = $prod['cost_price'];
    $bean->cost_usdollar = $prod['cost_usdollar'];
    $bean->discount_price = $prod['discount_price'];
    $bean->discount_usdollar = $prod['discount_usdollar'];
    $bean->list_price = $prod['list_price'];
    $bean->list_usdollar = $prod['list_usdollar'];
    $bean->type_id = $typeIds[$prod['type']];
    $bean->category_id = $catIds[$prod['category']];

    $bean->save();
}

