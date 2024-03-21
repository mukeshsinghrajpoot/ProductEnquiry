define(['jquery','Magento_Ui/js/modal/modal','mage/url'],
function($,modal,urlBuilder) 
{           
           $(".enquiry-product").on('click',function(){ 
                event.preventDefault();     
                var enquiryskuget = $(this).attr("data-sku");
                var datatitle = $(this).attr("data-title");
                var options = {
                type: 'popup',
                responsive: true,
                innerScroll: true,
                title: datatitle,
                buttons: [],
                modalClass: 'custom_popup_box'
            };

            var popup = modal(options, $('#popup-modal'+enquiryskuget));
                jQuery(".error").remove();
                $("#popup-modal"+enquiryskuget).modal("openModal");
                savedata(enquiryskuget);
            });
           function savedata(enquiryskuget)
           {
            /*save data*/
            $("#submit_enquire"+enquiryskuget).click(function(){
              jQuery(".error").remove();
              var product_name=$('#pname'+enquiryskuget).val();
              var product_sku=$('#sku'+enquiryskuget).val();
              var first_name=$('#fname'+enquiryskuget).val();
              var last_name=$('#lname'+enquiryskuget).val();
              var subject=$('#subject'+enquiryskuget).val();
              var email=$('#email'+enquiryskuget).val();
              var message=$('#message'+enquiryskuget).val();
              if (!first_name) 
              {
                var datamessage = 'first name is required';
                jQuery('#fname'+enquiryskuget).after('<div class="error">'+datamessage+'</div>');
              }
              if (!last_name) 
              {
                var datamessage = 'last name is required';
                jQuery('#lname'+enquiryskuget).after('<div class="error">'+datamessage+'</div>');
              }
              if (!subject) 
              {
                var datamessage = 'subject is required';
                jQuery('#subject'+enquiryskuget).after('<div class="error">'+datamessage+'</div>');
              }
              if (!email) 
              {
                var datamessage = 'email is required';
                jQuery('#email'+enquiryskuget).after('<div class="error">'+datamessage+'</div>');
              }
              var pattern = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i
              if(!pattern.test(email) && email)
              {
                var datamessage = 'not a valid e-mail address';
                jQuery('#email'+enquiryskuget).after('<div class="error">'+datamessage+'</div>');
              }
              if (!message) 
              {
                var datamessage = 'message is required';
                jQuery('#message'+enquiryskuget).after('<div class="error">'+datamessage+'</div>');
              }
                if (!first_name||!last_name||!subject||!email||!message||!pattern.test(email)) {
                        return false;
                    }  
              var saveproducturl = urlBuilder.build('productenquiry/product/save');
                $.ajax({
                    url: saveproducturl,
                    type: 'POST',
                    showLoader: true,
                    cache: false,
                    dataType: 'json',
                    data: {
                        product_name: product_name,
                        product_sku: product_sku,
                        first_name: first_name,
                        last_name: last_name,
                        subject: subject,
                        email: email,
                        message:message,
                    },
                    complete: function(response) {  
                    var dataresponse = response.responseJSON;      
                        var success=dataresponse.success;
                        var successm=dataresponse.messages;
                        var pagereloadtime=dataresponse.pagereloadtime;
                        if(success==200)
                        {
                         jQuery('#responcedata'+enquiryskuget).append('');
                         jQuery('#formdata'+enquiryskuget).hide();   
                         jQuery('#responcedata'+enquiryskuget).append('<span class="success">'+successm+'</span>');
                         setTimeout(function() {location.reload();}, pagereloadtime);
                        }else
                        {
                          jQuery('#responcedata'+enquiryskuget).append('');
                          jQuery('#responcedata'+enquiryskuget).append('<span class="error">'+successm+'</span>');
                        }
                    },
                    error: function (xhr, status, errorThrown) {
                        jQuery('#responcedata'+enquiryskuget).append('');
                        jQuery('#responcedata'+enquiryskuget).append('<span class="error">Error happens. Try again.</span>');
                    }
                });
            })
          }
}
);