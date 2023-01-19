$("#address-form").submit(function () {
    validateAddress($(this));
    return false;
});

$("#save-address-button").click(function () {
    let data = {};
    if ($("#usps-tab").hasClass("active")) {
        data = getUSPSData();
    } else if ($("#original-tab").hasClass("active")) {
        data = getOriginalData();
    } else {
        return false;
    }

    saveAddress($(this), data);
});

function getOriginalData() {
    return {
        address_line_1: $("#original-address-line-1").html(),
        address_line_2: $("#original-address-line-2").html(),
        city: $("#original-city").html(),
        state: $("#original-state").html(),
        zip_code: $("#original-zip-code").html(),
    };
}

function getUSPSData() {
    return {
        address_line_1: $("#usps-address-line-1").html(),
        address_line_2: $("#usps-address-line-2").html(),
        city: $("#usps-city").html(),
        state: $("#usps-state").html(),
        zip_code: $("#usps-zip-code").html(),
    };
}

function validateAddress(form) {
    const validateButton = $("#validate-button");
    validateButton.prop("disabled", true);
    $.post(
        "/validate",
        form.serialize(),
        function (data) {
            if (data.original) {
                $("#original-address-line-1").html(data.original.Address1);
                $("#original-address-line-2").html(data.original.Address2);
                $("#original-city").html(data.original.City);
                $("#original-state").html(data.original.State);
                $("#original-zip-code").html(data.original.Zip5);
            }
            if (data.usps) {
                $("#usps-address-line-1").html(data.usps.Address1);
                $("#usps-address-line-2").html(data.usps.Address2);
                $("#usps-city").html(data.usps.City);
                $("#usps-state").html(data.usps.State);
                $("#usps-zip-code").html(data.usps.Zip5);
            }
            $("#validationModal").modal("show");
        },
    ).done(function () {
        validateButton.prop("disabled", false);
    });
}

function saveAddress(button, data) {
    button.prop("disabled", true);
    $.post(
        "/save",
        data,
        function (data) {
            console.log(data);
            const alert = $("#saved-alert");
            alert.removeClass("d-none");
            alert.removeClass("alert-success alert-warning");
            if (data.success) {
                alert.html("Address saves successfully!");
                alert.addClass("alert-success");
            } else {
                alert.html("Something went wrong try later!");
                alert.addClass("alert-warning");
            }
        },
    ).done(function () {
        button.prop("disabled", false);
    });
}