$(document).ready(function() {
    // Hide all steps initially except first
    let currentStep = 1;
    $('.step-content').not(':first').hide();
    updateProgress();
    
   

    $('.next-step').click(function() {
        if (validateStep(currentStep)) {
            // Store current and next step elements
            const currentStepElement = $(`#step${currentStep}`);
            const nextStep = currentStep + 1;
            const nextStepElement = $(`#step${nextStep}`);

            currentStepElement.removeClass('active');
        nextStepElement.addClass('active');
        
            console.log('Before transition:', {
                currentStep: currentStepElement.css('display'),
                nextStep: nextStepElement.css('display')
            
            });

            // Perform transition
            currentStepElement.fadeOut(300, function() {
                nextStepElement.fadeIn(300, function() {
                    console.log('After transition:', {
                        currentStep: currentStepElement.css('display'),
                        nextStep: nextStepElement.css('display'),
                        currentStepID: currentStepElement.attr('id'),
                nextStepID: nextStepElement.attr('id')
                    });
                });

                currentStep = nextStep;

                updateProgress();              
                
                if (currentStep === 5) {
                    updateSummary();
                }
            });

           
        }
    });

    $('.prev-step').click(function() {
        // Store current and previous step elements
        const currentStepElement = $(`#step${currentStep}`);
        const prevStep = currentStep - 1;
        const prevStepElement = $(`#step${prevStep}`);

        // Perform transition
        currentStepElement.fadeOut(300, function() {
            prevStepElement.fadeIn(300);
            currentStep = prevStep;
            updateProgress();
        });
    });

    function updateProgress() {
        const progress = ((currentStep - 1) / 4) * 100;
        $('.progress-bar').css('width', `${progress}%`);
        $('.step').removeClass('active');
        $(`.step:lt(${currentStep})`).addClass('active');
    }

    function validateStep(step) {
        const currentStepElement = $(`#step${step}`);
        const requiredFields = currentStepElement.find('[required]');
        let valid = true;

        requiredFields.each(function() {
            if (!$(this).val()) {
                valid = false;
                $(this).addClass('is-invalid');
            } else {
                $(this).removeClass('is-invalid');
            }
        });

        return valid;
    }

    function updateSummary() {
        const summary = {
            'Contact Information': {
                'Name': `${$('[name="first_name"]').val()} ${$('[name="last_name"]').val()}`,
                'Email': $('[name="email"]').val(),
                'Phone': $('[name="phone"]').val()
            },
            'Service Details': {
                'Service Type': $('[name="service_type"] option:selected').text(),
                'Frequency': $('[name="frequency"] option:selected').text()
            },
            'Property Details': {
                'Type': $('[name="property_type"] option:selected').text(),
                'Size': `${$('[name="square_footage"]').val()} sq ft`,
                'Address': $('[name="address"]').val()
            },
            'Schedule': {
                'Date': $('[name="preferred_date"]').val(),
                'Time': $('[name="preferred_time"] option:selected').text()
            }
        };

        let summaryHTML = '';
        for (const [section, details] of Object.entries(summary)) {
            summaryHTML += `<h4>${section}</h4><dl class="row">`;
            for (const [key, value] of Object.entries(details)) {
                summaryHTML += `
                    <dt class="col-sm-3">${key}</dt>
                    <dd class="col-sm-9">${value}</dd>
                `;
            }
            summaryHTML += '</dl>';
        }

        $('#bookingSummary').html(summaryHTML);
    }
});
