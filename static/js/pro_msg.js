        var info={
                feedbackIcons: {
                    valid: 'glyphicon glyphicon-ok',
                    invalid: 'glyphicon glyphicon-remove',
                    validating: 'glyphicon glyphicon-refresh'
                },
                fields: {
                    country: {
                        validators: {
                            notEmpty: {
                                message: ' *Please complete all required fields!'
                            }
                        }
                    },
                    address1: {
                        validators: {
                            notEmpty: {
                                message: ' *Please complete all required fields!'
                            }
                        }
                    },
                    personname:{
                        validators: {
                            notEmpty: {
                                message: ' *Please complete all required fields!'
                            }
                        }
                    },
                    city:{
                        validators: {
                            notEmpty: {
                                message: ' *Please complete all required fields!'
                            }
                        }
                    },
                    postal:{
                        validators: {
                            notEmpty: {
                                message: ' *Please complete all required fields!'
                            },
                            regexp: {
                                message: 'Please enter the postal code of your country'  
                            }
                        }
                    },
                    phone:{
                        validators: {
                            notEmpty: {
                                message: ' *Please complete all required fields!'
                            }
                        }
                    },
                    state:{
                        validators: {
                            notEmpty: {
                                message: ' *Please complete all required fields!'
                            }
                        }
                    },
                    phonenumber:{
                        validators: {
                            notEmpty: {
                                message: ' *Please complete all required fields!'
                            }
                        }
                    },
                    email:{
                        validators: {
                            notEmpty: {
                                message: '*Please complete all required fields!'
                            }
                        }
                    }
                }
            };
        function FunReg(a) {
            let val=$('#'+a+' option:selected').val();
            switch(val){
                case "JP":
                    info.fields.postal.validators.regexp.regexp=/^[0-9-]{7,8}$/;
                    $('#postal').attr("placeholder","0000000");
                    break;
                case "CA":
                    info.fields.postal.validators.regexp.regexp=/^\d{6}$/;
                    $('#postal').attr("placeholder","000000");
                    break;
                case "RU":
                    info.fields.postal.validators.regexp.regexp=/^\d{6}$/;
                    $('#postal').attr("placeholder","000000");
                    break;
                case "SE":
                    info.fields.postal.validators.regexp.regexp=/^\d{5}$/;
                    $('#postal').attr("placeholder","00000");
                    break;
                default :
                    info.fields.postal.validators.regexp.regexp=/^[\w\s-]{4,}$/;
                    $('#postal').attr("placeholder","0000+");
                    break;
            };
            getSelect(us_state,val);
        };
        FunReg("countrySelector");
        $('#defaultForm').bootstrapValidator(info);