<?php
require_once('./headerSeniorVerificationDashboard.php');

?>
<section class="container-body">
    <header>
        <div class="data-navigation">
            <div class="active" data-tab-target="#table-details-fresh">New</div>
            <div data-tab-target="#table-details-return">Return</div>
        </div>
    </header>
    <div class="container-1st">
        <div class="container active" data-tab-content id="table-details-fresh">
            <div class="row">
                <div>
                    <table class="table active table-bordered table-striped table-hover" id="data-table">
                        <thead>
                            <tr>
                                <th>Application No</th>
                                <th>Name</th>
                                <th>Contact number</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($viewDetails->showForwardedApplications() as $viewDetail) : ?>
                                <tr>
                                    <td><?php echo $viewDetail['application_no']; ?></td>
                                    <td><?php echo $viewDetail['firstname'] . " " . $viewDetail['middlename'] . " " . $viewDetail['lastname']; ?></td>
                                    <td><?php echo $viewDetail['primary_no']; ?></td>
                                    <td><?php echo $viewDetail['email']; ?></td>
                                    <form method="POST">
                                        <td class="td-buttons">
                                            <input type="submit" class="btn btn-primary" name="view-details" value="View">
                                            <input type="hidden" name="viewDetailsHidden" id="viewDetailsHidden" value="<?php echo $viewDetail['application_no']; ?>">
                                            <input type="submit" class="btn btn-danger <?php echo $viewDetail['application_no']; ?>" id="delete" name="delete" value="Delete">
                                        </td>
                                    </form>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="container" data-tab-content id="table-details-return">
            <div class="row">
                <div>
                    <table class="table active table-bordered table-striped table-hover" id="data-table">
                        <thead>
                            <tr>
                                <th>Application No</th>
                                <th>Name</th>
                                <th>Contact number</th>
                                <th>Email</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($viewDetails->show_return_clients() as $viewDetail) : ?>
                                <tr>
                                    <td><?php echo $viewDetail['application_no']; ?></td>
                                    <td><?php echo $viewDetail['firstname'] . " " . $viewDetail['middlename'] . " " . $viewDetail['lastname']; ?></td>
                                    <td><?php echo $viewDetail['primary_no']; ?></td>
                                    <td><?php echo $viewDetail['email']; ?></td>
                                    <form method="POST">
                                        <td class="td-buttons">
                                            <input type="submit" class="btn btn-primary" name="view-details" value="View">
                                            <input type="hidden" name="viewDetailsHidden" id="viewDetailsHidden" value="<?php echo $viewDetail['application_no']; ?>">
                                            <input type="submit" class="btn btn-danger <?php echo $viewDetail['application_no']; ?>" id="delete" name="delete" value="Delete">
                                        </td>
                                    </form>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
</section>



<!-- overlay or modal for logout button when clicked -->
<div class="container-overlay" id="container-overlay">
    <div class="modal-logout">
        <div class="modal-logout-header">
            <p>Confirm Logout</p>
        </div>
        <div class="modal-logout-message">
            <p>Are you sure you want to logout?</p>
        </div>
        <div class="modal-buttons">
            <form action="../../logout.php" method="POST">
                <button type="submit" class="btn btn-danger" name="log-out">YES</button>
            </form>
            <button class="btn btn-primary" id="modal-cancel">CANCEL</button>
        </div>
    </div>
</div>

<!-- overlay or modal when view button is clicked -->
<div class="view-details <?php echo $active ?>" id="view-details">
    <form method="post" enctype="multipart/form-data">
        <?php foreach ((array)$viewDetails->view_single_client_details() as $viewDetail) : ?>
            <div class="cancel-button">
                <div class="cancel-button-inside" id="cancel-button-inside"></div>
            </div>

            <div class="container-information">
                <div class="container-information-child">
                    <div class="container-information-left">
                        <div class="container-view-appNumber">
                            <label for="view-appNumber">Application Number: </label>
                            <span><?php echo $viewDetail['application_no']; ?></span>
                            <input type="hidden" name='id' value="<?php echo $viewDetail['application_no']; ?>" />
                        </div>

                        <div class="container-view-name">
                            <label for="view-name">Name: </label>
                            <span><?php echo $viewDetail['firstname'] . " " . $viewDetail['lastname']; ?></span>
                        </div>

                        <div class="container-view-address">
                            <label>Address: </label>
                            <span><?php echo $viewDetail['house_no'] . " " . $viewDetail['street'] . " " .  $viewDetail['barangay'] . " " .  $viewDetail['city'] . " " .  $viewDetail['municipality']; ?></span>
                        </div>

                        <div class="container-view-cNumber">
                            <label for="view-cNumber">Contact Number: </label>
                            <span><?php echo $viewDetail['primary_no']; ?></span>
                        </div>

                        <div class="container-view-altNumber">
                            <label>Alternate Number: </label>
                            <span><?php echo $viewDetail['secondary_no']; ?></span>
                        </div>

                        <div class="container-view-gender">
                            <label>Gender: </label>
                            <span><?php echo $viewDetail['gender']; ?></span>
                        </div>

                        <div class="container-view-email">
                            <label>Email: </label>
                            <span><?php echo $viewDetail['email']; ?></span>
                        </div>

                        <div class="container-view-compName">
                            <label>Company Name: </label>
                            <span><?php echo $viewDetail['company_name']; ?></span>
                        </div>

                        <div class="container-view-position">
                            <label>Position: </label>
                            <span><?php echo $viewDetail['position']; ?></span>
                        </div>

                        <div class="container-view-dateHire">
                            <label>Date Hire: </label>
                            <span><?php echo $viewDetail['date_hired']; ?></span>
                        </div>

                        <div class="container-view-salary">
                            <label>Salary: </label>
                            <span><?php echo $viewDetail['basic_salary']; ?></span>
                        </div>

                        <div class="container-view-bankDetails">
                            <label>Bank Details: </label>
                            <span><?php echo $viewDetail['primary_bank']; ?></span>
                        </div>

                    </div>

                    <div class="container-information-right">
                        <div class="view-details-right-top">
                            <div class="container-attachment">
                                <fieldset class="fieldAttachment">
                                    <legend>Attachment</legend>
                                    <div class="view-uploaded-file">
                                        <!-- <button name="view-govtId" type="submit">ID</button> -->
                                        <a class="btn btn-primary" href="../../image.php?application_no=<?php echo $viewDetail['application_no'] . '&filename=Attachment0'; ?>" target="_blank" rel="noopener noreferrer">ID</a>
                                        <a class="btn btn-primary" href="../../image.php?application_no=<?php echo $viewDetail['application_no'] . '&filename=Attachment1'; ?>" target="_blank" rel="noopener noreferrer">COID</a>
                                        <a class="btn btn-primary" href="../../image.php?application_no=<?php echo $viewDetail['application_no'] . '&filename=Attachment2'; ?>" target="_blank" rel="noopener noreferrer">POI</a>
                                        <a class="btn btn-primary" href="../../image.php?application_no=<?php echo $viewDetail['application_no'] . '&filename=Attachment3'; ?>" target="_blank" rel="noopener noreferrer">POB</a>
                                        <a class="btn btn-primary" href="../../image.php?application_no=<?php echo $viewDetail['application_no'] . '&filename=Attachment4'; ?>" target="_blank" rel="noopener noreferrer">ATM</a>
                                        <a class="btn btn-primary" href="../../image.php?application_no=<?php echo $viewDetail['application_no'] . '&filename=Attachment5'; ?>" target="_blank" rel="noopener noreferrer">OTHERS</a>
                                    </div>
                                    <div class="file-upload">
                                        <div class="file-upload-container">
                                            <input type="file" name="file-govtid" id="govt-id" />
                                            <label>*File type must be maximum of 25mb* - GOV'T ID</label>
                                            <input type="file" name="file-coid" />
                                            <label>*File type must be maximum of 25mb* - COID</label>
                                            <input type="file" name="file-poi" />
                                            <label>*File type must be maximum of 25mb* - POI</label>
                                        </div>
                                        <div class="file-upload-container">
                                            <input type="file" name="file-pob" />
                                            <label>*File type must be maximum of 25mb* - POB</label>
                                            <input type="file" name="file-atm" />
                                            <label>*File type must be maximum of 25mb* - ATM</label>
                                            <input type="file" name="file-others" />
                                            <label>*File type must be maximum of 25mb* - OTHERS</label>
                                        </div>
                                    </div>
                                </fieldset>
                            </div>

                            <div class="container-textArea">
                                <fieldset class="fTextArea">
                                    <legend>Remarks</legend>
                                    <textarea class="textArea" name='remarks-field'><?php echo $viewDetail['remarks']; ?></textarea>
                                </fieldset>
                            </div>



                            <div class="container-view-button">
                                <button type="submit" class="btn btn-primary" name="save-remarks">Save</button>
                                <input class="btn btn-info" hidden name="save-id" value="<?php echo $viewDetail['application_no']; ?>" />
                                <button type="button" class="btn btn-danger" id="bottom-cancel">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
    </form>

    <form action="./svoInterviewer.php" method="POST">
        <div class="view-details-right-bottom">
            <button type="submit" name="edit" class="btn btn-primary">Edit</button>
            <input class="btn btn-info" hidden name="save-ids" value="<?php echo $viewDetail['application_no']; ?>" />
        </div>
    </form>
</div>
<?php endforeach; ?>
</div>
<div class="overlay <?php echo $active ?>" id="overlay"></div>


<script src="../../Js/verifierDashboard.js"></script>
</body>

</html>