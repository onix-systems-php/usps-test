<?php
/**
 * @var string $greetings
 * @var array $states
 */
?>
<div class="modal d-flex z-10"
     tabindex="-1"
     role="dialog"
     aria-labelledby="uspsModalLabel"
     aria-hidden="true"
     style="z-index: 10">
    <div class="modal-dialog modal-xl modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row">
                    <div class="col-12">
                        <h5>Address Validator</h5>
                        <small class="text-secondary">
                            <strong>Validate/Standardizes addresses using USPS</strong>
                        </small>
                    </div>
                </div>
            </div>
            <div class="modal-body">
                <form id="address-form">
                    <div class="mb-3">
                        <label for="address-line-1" class="form-label">Address Line 1</label>
                        <input type="text"
                               class="form-control"
                               id="address-line-1"
                               name="address_line_1"
                               required
                               value="Suite 6100">
                    </div>

                    <div class="mb-3">
                        <label for="address-line-2" class="form-label">Address Line 2</label>
                        <input type="text"
                               class="form-control"
                               id="address-line-2"
                               name="address_line_2"
                               required
                               value="185 Berry St">
                    </div>

                    <div class="mb-3">
                        <label for="city" class="form-label">City</label>
                        <input type="text"
                               class="form-control"
                               id="city"
                               name="city"
                               required
                               value="San Francisco">
                    </div>

                    <div class="mb-3">
                        <label for="state" class="form-label">State</label>
                        <select id="state" class="form-select" name="state" required>
                            <option value="">(select)</option>
                            <?php foreach ($states as $key => $state) { ?>
                                <option value="<?= $key ?>" <?= $key == 'CA' ? 'selected' : '' ?>><?= $state ?></option>
                            <?php } ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="zip-code" class="form-label">Zip Code</label>
                        <input type="text"
                               class="form-control"
                               id="zip-code"
                               name="zip_code"
                               required
                               value="94556">
                    </div>

                    <div class="d-flex justify-content-center">
                        <button type="submit"
                                id="validate-button"
                                class="btn btn-primary text-uppercase">
                            Validate
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Validation Modal -->
<div class="modal fade"
     id="validationModal"
     tabindex="-1"
     aria-labelledby="validationModalLabel"
     aria-hidden="true"
     style="z-index: 9999">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="validationModalLabel">Save Address</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-secondary">Which address format do you want to save?</p>

                <ul class="nav nav-pills" id="validatedTabs" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active text-uppercase"
                                id="original-tab"
                                data-bs-toggle="tab"
                                data-bs-target="#original"
                                type="button"
                                role="tab"
                                aria-controls="original"
                                aria-selected="true">Original
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link text-uppercase"
                                id="usps-tab"
                                data-bs-toggle="tab"
                                data-bs-target="#usps"
                                type="button"
                                role="tab"
                                aria-controls="usps"
                                aria-selected="false">Standardized (USPS)
                        </button>
                    </li>
                </ul>

                <div class="tab-content mt-3" id="myTabContent">
                    <div class="tab-pane fade show active" id="original" role="tabpanel" aria-labelledby="original-tab">
                <pre class="px-3 pt-3 border rounded">
<span>Address Line 1:</span> <span id="original-address-line-1"></span>
<span>Address Line 2:</span> <span id="original-address-line-2"></span>
<span>City:</span> <span id="original-city"></span>
<span>State:</span> <span id="original-state"></span>
<span>Zip Code:</span> <span id="original-zip-code"></span>
                </pre>
                    </div>
                    <div class="tab-pane fade" id="usps" role="tabpanel" aria-labelledby="usps-tab">
                <pre class="px-3 pt-3 border rounded">
<span>Address Line 1:</span> <span id="usps-address-line-1"></span>
<span>Address Line 2:</span> <span id="usps-address-line-2"></span>
<span>City:</span> <span id="usps-city"></span>
<span>State:</span> <span id="usps-state"></span>
<span>Zip Code:</span> <span id="usps-zip-code"></span>
                </pre>
                    </div>
                </div>

                <div id="saved-alert" class="alert d-none" role="alert"></div>
            </div>
            <div class="modal-footer">
                <button id="save-address-button" type="button" class="btn btn-primary text-uppercase">Save</button>
            </div>
        </div>
    </div>
</div>
<script src="/assets/js/home.js"></script>
