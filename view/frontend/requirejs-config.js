var config = {
    map: {
        '*': {
            productenquiry: 'Bluethinkinc_ProductEnquiry/js/productenquiry',
            productlistenquiry: 'Bluethinkinc_ProductEnquiry/js/productlistenquiry'
        }
    },
    shim: {
        'productenquiry': {
            deps: ['jquery']
        },
        'productlistenquiry': {
            deps: ['jquery']
        }
    }
};
