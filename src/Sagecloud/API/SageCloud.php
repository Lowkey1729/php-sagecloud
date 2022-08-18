<?php

namespace Capiflex\SageCloud\API;

class SageCloud
{
    private const BASE_URL = 'https://sagecloud.ng/api/v2';
    private const PURCHASE_AIRTIME_URL = '/airtime';

    private const FETCH_DATA_PROVIDERS = '/internet/data/fetch-providers';
    private const FETCH_DATA_BUNDLES = '/internet/data/lookup';
    private const PURCHASE_DATA = '/internet/data';

    #private const SPECTRANET_PIN_LOOKUP = '/internet/data/spectranet/lookup';
    #private const SPECTRANET_PIN_PURCHASE = '/internet/data/spectranet';

    #private const SMILE_BUNDLE_LOOKUP = '/internet/data/smile/lookup';
    #private const SMILE_CUSTOMER_VALIDATION = '/internet/data/smile/validate';
    #private const SMILE_BUNDLE_PURCHASE = '/internet/data/smile';

    private const FETCH_CABLE_TV_PROVIDERS = '/cable-tv/fetch-providers';
    private const VALIDATE_CABLE_TV_SMARTCARD = '/cable-tv/validate-customer';
    #private const FETCH_CABLETV_BILLERS_FOR_PROVIDERS = '/cable-tv/fetch-billers?type={service_type}';
    private const PURCHASE_CABLE_TV = '/cable-tv/purchase';

    private const FETCH_POWER_BILLERS = '/electricity/fetch-billers';
    private const VALIDATE_POWER_METER = '/electricity/validate-customer';
    private const PURCHASE_POWER = '/electricity/purchase';

    private const FETCH_BANKS = '/transfer/get-transfer-data';
    private const VERIFY_BANK_DETAILS = '/transfer/verify-bank-account';
    private const TRANSFER_FUNDS = '/transfer/fund-transfer';

    private const PURCHASE_EPIN = '/epin/purchase';

    private const REQUERY = '/transaction/requery';

    private const FETCH_BETTING_BILLERS = '/betting/billers';
    private const VALIDATE_BETTING = '/betting/validate';
    private const FUND_BETTING = '/betting/payment';

    private const CORPORATE_DATA_LOOKUP = '/corporate-data/list';
    private const CORPORATE_DATA_PURCHASE = '/corporate-data/purchase';

    private const SME_DATA_LOOKUP = '/sme-data/list';
    private const SME_DATA_PURCHASE = '/sme-data/purchase';

    private const WAEC_LOOKUP = '/education/waec-lookup';
    private const WAEC_PIN_PURCHASE = '/education/waec-purchase';

    private const JAMB_LOOKUP = '/education/jamb-pricing-options';
    private const JAMB_PROFILE_VALIDATE = '/education/jamb-profile-code/validate';
    private const JAMB_PIN_PURCHASE = '/education/jamb-pin-purchase';

    private const AUTHORIZATION = '/merchant/authorization';



}