<!-- overlay or modal when view button is clicked -->
<div class="view-details active" id="view-details">
    <form method="post" enctype="multipart/form-data">
        <div class="cancel-button">
            <div class="cancel-button-inside" id="cancel-button-inside"></div>
        </div>

        <div class="container-information">
            <div class="container-information-child">
                <div class="container-information-left">
                    <div class="container-view-appNumber">
                        <label for="view-appNumber">Application Number: </label>
                        <span></span>
                        <input type="hidden" name='id' value="" />
                    </div>

                    <div class="container-view-name">
                        <label for="view-name">Name: </label>
                        <span></span>
                    </div>

                    <div class="container-view-address">
                        <label>Address: </label>
                        <span></span>
                    </div>

                    <div class="container-view-cNumber">
                        <label for="view-cNumber">Contact Number: </label>
                        <span></span>
                    </div>

                    <div class="container-view-altNumber">
                        <label>Alternate Number: </label>
                        <span></span>
                    </div>

                    <div class="container-view-gender">
                        <label>Gender: </label>
                        <span></span>
                    </div>

                    <div class="container-view-email">
                        <label>Email: </label>
                        <span></span>
                    </div>

                    <div class="container-view-compName">
                        <label>Company Name: </label>
                        <span></span>
                    </div>

                    <div class="container-view-position">
                        <label>Position: </label>
                        <span></span>
                    </div>

                    <div class="container-view-dateHire">
                        <label>Date Hire: </label>
                        <span></span>
                    </div>

                    <div class="container-view-salary">
                        <label>Salary: </label>
                        <span></span>
                    </div>

                    <div class="container-view-bankDetails">
                        <label>Bank Details: </label>
                        <span></span>
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

                                <?php if ($viewDetail['status'] !== "Fresh") {
                                    echo "<div class='file-upload'>
                                                <div class='file-upload-container'>
                                                    <input type='file' name='file-govtid' id='govt-id' />
                                                    <label>*File type must be maximum of 25mb* - GOV'T ID</label>
                                                    <input type='file' name='file-coid' />
                                                    <label>*File type must be maximum of 25mb* - COID</label>
                                                    <input type='file' name='file-poi' />
                                                    <label>*File type must be maximum of 25mb* - POI</label>
                                                </div>
                                                <div class='file-upload-container'>
                                                    <input type='file' name='file-pob' />
                                                    <label>*File type must be maximum of 25mb* - POB</label>
                                                    <input type='file' name='file-atm' />
                                                    <label>*File type must be maximum of 25mb* - ATM</label>
                                                    <input type='file' name='file-others' />
                                                    <label>*File type must be maximum of 25mb* - OTHERS</label>
                                                </div>
                                            </div>";
                                }
                                ?>

                            </fieldset>
                        </div>

                        <div class="container-textArea">
                            <fieldset class="fTextArea">
                                <legend>Remarks</legend>
                                <textarea class="textArea" name='remarks-field'></textarea>
                            </fieldset>
                        </div>



                        <div class="container-view-button">
                            <?php if ($viewDetail['for_forward'] == 'Forward') {
                                echo "<button type='submit' class='btn btn-success' name='button-forward'>Forward</button>";
                            } ?>
                            <?php if ($viewDetail['status'] == 'Fresh') {
                                echo "<button type='submit' name='btnInprocess' class='btn btn-success'>In Process</button>";
                            } ?>
                            <button type="submit" class="btn btn-primary" name="save-remarks">Save</button>
                            <input class="btn btn-info" hidden name="save-id" value="" />
                            <input type="hidden" name="inprocessValue" value="inprocess">
                            <button type="button" class="btn btn-danger" id="bottom-cancel">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
    </form>

    <form action="./interviewer.php" method="POST">
        <div class="view-details-right-bottom">
            <?php if ($viewDetail['status'] !== 'Fresh') {
                echo "<button type='submit' name='edit' class='btn btn-primary'>Edit</button>";
            } ?>

            <input class="btn btn-info" hidden name="save-ids" value="" />
        </div>
    </form>
</div>



<div class="overlay active" id="overlay"></div>