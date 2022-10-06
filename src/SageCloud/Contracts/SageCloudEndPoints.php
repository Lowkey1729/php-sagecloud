<?php

namespace Capiflex\SageCloud\Contracts;

interface SageCloudEndPoints
{
    public const BASE_URL = 'https://sagecloud.ng/api';
    public const PURCHASE_AIRTIME_URL = '/v2/airtime';

    public const FETCH_DATA_PROVIDERS = '/v2/internet/data/fetch-providers';
    public const FETCH_DATA_BUNDLES = '/v2/internet/data/lookup?provider=';
    public const PURCHASE_DATA = '/v2/internet/data';

    #public const SPECTRANET_PIN_LOOKUP = '/internet/data/spectranet/lookup';
    #public const SPECTRANET_PIN_PURCHASE = '/internet/data/spectranet';

    #public const SMILE_BUNDLE_LOOKUP = '/internet/data/smile/lookup';
    #public const SMILE_CUSTOMER_VALIDATION = '/internet/data/smile/validate';
    #public const SMILE_BUNDLE_PURCHASE = '/internet/data/smile';

    public const FETCH_CABLE_TV_PROVIDERS = '/v2/cable-tv/fetch-providers';
    public const FETCH_CABLE_TV_BILLERS_FOR_PROVIDERS = '/v2/cable-tv/fetch-billers?type=';
    public const VALIDATE_CABLETV_SMARTCARD = '/v2/cable-tv/validate-customer';
    #public const FETCH_CABLETV_BILLERS_FOR_PROVIDERS = '/cable-tv/fetch-billers?type={service_type}';
    public const PURCHASE_CABLE_TV = '/v2/cable-tv/purchase';

    public const FETCH_POWER_BILLERS = '/v2/electricity/fetch-billers';
    public const VALIDATE_POWER_METER = '/v2/electricity/validate-customer';
    public const PURCHASE_POWER = '/v2/electricity/purchase';

    public const FETCH_BANKS = '/v2/transfer/get-transfer-data';
    public const VERIFY_BANK_DETAILS = '/v2/transfer/verify-bank-account';
    public const TRANSFER_FUNDS = '/v2/transfer/fund-transfer';

    public const PURCHASE_EPIN = '/v2/epin/purchase';

    public const REQUERY = '/v2/transaction/requery';

    public const FETCH_BETTING_BILLERS = '/v2/betting/billers';
    public const VALIDATE_BETTING = '/v2/betting/validate';
    public const FUND_BETTING = '/v2/betting/payment';

    public const CORPORATE_DATA_LOOKUP = '/v2/corporate-data/list';
    public const CORPORATE_DATA_PURCHASE = '/v2/corporate-data/purchase';

    public const SME_DATA_LOOKUP = '/v2/sme-data/list';
    public const SME_DATA_PURCHASE = '/v2/sme-data/purchase';

    public const WAEC_LOOKUP = '/v2/education/waec-lookup';
    public const WAEC_PIN_PURCHASE = '/v2/education/waec-purchase';

    public const JAMB_LOOKUP = '/v2/education/jamb-pricing-options';
    public const JAMB_PROFILE_VALIDATE = '/v2/education/jamb-profile-code/validate';
    public const JAMB_PIN_PURCHASE = '/v2/education/jamb-pin-purchase';

    public const AUTHORIZATION = '/merchant/authorization';

    public const GENERATE_VIRTUAL_ACCOUNT = '/v3/virtual-account/generate';
    public const UPDATE_VIRTUAL_ACCOUNT = '/v3/virtual-account/update/';
    public const DELETE_VIRTUAL_ACCOUNT = '/v3/virtual-account/delete/';
}