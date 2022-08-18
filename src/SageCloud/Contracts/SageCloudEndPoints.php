<?php

namespace SageCloud\Contracts;

interface SageCloudEndPoints
{
    public const BASE_URL = 'https://sagecloud.ng/api';
    public const PURCHASE_AIRTIME_URL = '/airtime';

    public const FETCH_DATA_PROVIDERS = '/internet/data/fetch-providers';
    public const FETCH_DATA_BUNDLES = '/internet/data/lookup';
    public const PURCHASE_DATA = '/internet/data';

    #public const SPECTRANET_PIN_LOOKUP = '/internet/data/spectranet/lookup';
    #public const SPECTRANET_PIN_PURCHASE = '/internet/data/spectranet';

    #public const SMILE_BUNDLE_LOOKUP = '/internet/data/smile/lookup';
    #public const SMILE_CUSTOMER_VALIDATION = '/internet/data/smile/validate';
    #public const SMILE_BUNDLE_PURCHASE = '/internet/data/smile';

    public const FETCH_CABLE_TV_PROVIDERS = '/cable-tv/fetch-providers';
    public const FETCH_CABLE_TV_BILLERS_FOR_PROVIDERS = '/v2/cable-tv/fetch-billers?type=';
    public const VALIDATE_CABLETV_SMARTCARD = '/cable-tv/validate-customer';
    #public const FETCH_CABLETV_BILLERS_FOR_PROVIDERS = '/cable-tv/fetch-billers?type={service_type}';
    public const PURCHASE_CABLE_TV = '/cable-tv/purchase';

    public const FETCH_POWER_BILLERS = '/electricity/fetch-billers';
    public const VALIDATE_POWER_METER = '/electricity/validate-customer';
    public const PURCHASE_POWER = '/electricity/purchase';

    public const FETCH_BANKS = '/transfer/get-transfer-data';
    public const VERIFY_BANK_DETAILS = '/transfer/verify-bank-account';
    public const TRANSFER_FUNDS = '/transfer/fund-transfer';

    public const PURCHASE_EPIN = '/epin/purchase';

    public const REQUERY = '/transaction/requery';

    public const FETCH_BETTING_BILLERS = '/betting/billers';
    public const VALIDATE_BETTING = '/betting/validate';
    public const FUND_BETTING = '/betting/payment';

    public const CORPORATE_DATA_LOOKUP = '/corporate-data/list';
    public const CORPORATE_DATA_PURCHASE = '/corporate-data/purchase';

    public const SME_DATA_LOOKUP = '/sme-data/list';
    public const SME_DATA_PURCHASE = '/sme-data/purchase';

    public const WAEC_LOOKUP = '/education/waec-lookup';
    public const WAEC_PIN_PURCHASE = '/education/waec-purchase';

    public const JAMB_LOOKUP = '/education/jamb-pricing-options';
    public const JAMB_PROFILE_VALIDATE = '/education/jamb-profile-code/validate';
    public const JAMB_PIN_PURCHASE = '/education/jamb-pin-purchase';

    public const AUTHORIZATION = '/merchant/authorization';
}