# PHP SAGECLOUD

- [Documentation](#introduction)
- [Usage](#usage)
- [Support](#support)

## Installation

```php
composer require capiflex/php-sagecloud
```

<a name="usage"></a>

## Usage

```php
// Import the class namespaces first, before using it directly
use SageCloud\API\SageCloud as SageCloudClient;

$sageCloud = new SageCloudClient($email, $password, $secretKey);

//The email and password are your login credentials.
````

# TRANSFERS

### Fetch Banks

```php
  $sageCloud->fetchBanks();
```

### Verify Bank Details

```php
  $sageCloud->verifyBankDetails([
       'bank_code' => '011',
       'account_number' => '3123755866']);
```

### Transfer Funds

```php
 $sageCloud->transferFunds([
        'reference' => 'testing_package',
        'bank_code' => '011',
        'account_number' => '3123755866',
        'account_name' => 'Olarewaju Mojeed',
        'narration' => 'Testing Sagecloud PHP Package',
        'amount' => '100'
    ]);
```

# AIRTIME

```php
    $sageCloud->purchaseAirtime([
        'reference' => 'test_package_2',
        'network' => 'AIRTEL',
        'service' => 'AIRTELVTU',
        'phone' => '09010768387',
        'amount' => '100'
    ]);
```

# EPINS

```php
   $sageCloud->purchaseEpin([
        'reference' => 'test_package_3',
        'network' => 'AIRTEL',
        'service' => 'AIRTELVTU',
        'value' => '100',
        'quantity' => '1'
    ]);
```

# DATA

### Fetch Data Bundles

```php
    $sageCloud->fetchDataBundles('MTNDATA');
```

### Fetch Data Providers

```php
    $sageCloud->fetchDataProviders();
```

### Purchase Data

```php
    $sageCloud->purchaseData([
        'reference' => 'test_package_32',
        'type' => 'AIRTELDATA',
        'network' => 'AIRTEL',
        'phone' => '09010768387',
        'code' => '002'
    ]);
```

# POWER

### Fetch Electricity Billers

```php
    $sageCloud->fetchElectricityBillers();
```

### Validate Meter

```php
 $sageCloud->validateMeter([
        'type' => 'ikeja_electric_prepaid',
        'account_number' => '04277210086'
    ]);
```

### Purchase Power

```php
    $sageCloud->purchasePower([
        'reference' => 'test_package_90',
        'type' => 'ikeja_electric_prepaid',
        'disco' => 'IKEDC',
        'account_number' => '04277210086',
        'phone' => '09010768387',
        'amount' => '500'
    ]);
```

# CABLE TV

### Fetch Cable Tv Providers

```php
    $sageCloud->fetchCableTvProviders();
```

### Fetch Cable TV Billers

```php
    $sageCloud->fetchCableTVByBiller('gotv');
```

### Purchase Cable TV

```php
    $sageCloud->purchaseCableTv([
        'reference' => 'test_package_987',
        'code' => 'novaday',
        'smartCardNo' => '02146372183',
        'type' => 'startimes',
        'renewal' => false
    ]);
```

# WAEC

### WAEC Lookup

```php
    $sageCloud->handleWAECLookup();
```

### WAEC Purchase

```php
    $sageCloud->handleWAECPinPurchase([
        'amount' => '1800',
        'reference' => 'test_package_9870',
        'numberOfPin' => 1
    ]);
```

# JAMB

### JAMB Lookup

```php
    $sageCloud->handleJAMBLookup();
```

### Profile Validation

```php
    $sageCloud->handleJAMBProfileValidation([
        'type' => 'DE',
        'profileCode' => '1234456667'
    ]);
```

### Pin Purchase

```php
    $sageCloud->handleJAMBPinPurchase([
        'amount' => '4000',
        'type' => 'DE',
        'profileCode' => '1234456667'
    ]);
```

# SME DATA

### Lookup

```php
    $sageCloud->handleSMEDataLookup();
```

### Purchase

```php
    $sageCloud->handleSMEDataPurchase([
        'service' => 'sme_data_500mb',
        'phone' => '0812346373',
        'reference' => 'test_package_71826'
    ]);
```

# CORPORATE DATA

### Lookup

```php
    $sageCloud->handleCorporateDataLookup();
```

### Purchase

```php
    $sageCloud->handleCorporateDataPurchase([
        'service' => 'corporate_data_500mb',
        'phone' => '08152512121',
        'reference' => 'test_package_71820'
    ]);
```

# BETTING

### Billers

```php
    $sageCloud->fetchBettingBillers();
```

### Validate Betting

```php
$sageCloud->validateBetting([
        'type' => 'BetKing',
        'customerId' => '7352353'
    ]);
```

### Purchase

```php
    $sageCloud->fundBetting([
        'reference' => 'testing_package1',
        'type' => 'BetKing',
        'customerId' => '7352353',
        'name' => 'Test BetKing Account',
        'amount' => '100'
    ]);
```

# VIRTUAL ACCOUNT

### Generate Virtual Account

```php
    $sageCloud->generateVirtualAccount();
```

### Delete Virtual Account

```php
$sageCloud->deleteVirtualAccount($accountNumber)
```

### Update Virtual Account

```php
    $sageCloud->updateVirtualAccount($accountNumber)
```


