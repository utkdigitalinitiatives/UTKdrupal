/**
 * Email form updater for ETDs
 */

 function myFunction(value,ownerid,community_manager, pid) {
   // Create a readable text string of the curent date and time for logging
   var today = new Date();
   var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
   var time = today.getHours() + ":" +
                       today.getMinutes() + ":" + today.getSeconds();
   var dateTime = date+' '+time;

    /**
     * [email_ACCEPT is the automated email string for accepted]
     * @type {[string]}
     */
   var email_ACCEPT = dateTime+"\nDear "+ownerid+",\n\n"+
    "Congratulations! After careful review, your thesis/dissertation title of thesis has been accepted for publication by the Graduate School at the University of Tennessee. We look forward to publishing your work as soon as possible, making it available in UT's open repository, TRACE (Tennessee Research and Creative Exchange).\n\n"+
    "We will be publishing the most recent version of the file that you uploaded. Please look for our periodic announcement of newly published theses and dissertations, including yours.\n\n"+
    "A preview of the title page may be viewed here:\n";

    /**
     * [more_edits_required_text is the automated email string for feedback]
     * @type {[string]}
     */
    var more_edits_required_text = dateTime+"\nHi "+ownerid+",\n"+"I have reviewed your thesis/dissertation for formatting. Please make the following changes: \n\n"+
    "*****EDITORS PLEASE REPLACE WITH CHANGES*****\n"+
    "Changes\n"+
    "***********************************************\n\n"+
    "In order to submit a new version\:\n"+
    "1. Go to your My Account page\n"+
    "http\:\/\/trace.tennessee.edu\/cgi\/myaccount.cgi.\n"+
    "2. On the My Account page, click the title of this thesis\/dissertation...\n"+
    "3. then click the 'Revise Submission' link on the resulting preview page.\n\n"+
     "Use the Revise Submission form to upload any changes to your thesis\/dissertation.\n\n"+
    "If you have any questions, please email me at\n"+
    community_manager+".\n\n\n"+
    "Thanks,\n";

    /**
     * [more_edits_required_subject is the automated email string for feedback]
     * @type {[string]}
     */
    var more_edits_required_subject = "Revise and Resubmit ";
    var simple_required_subject = "Message from the Thesis Manager ";
    var congrats = " has been accepted!";


    /**
     * [switch incoming state of select is compared with strings]
     * @method switch
     * @param  {[type]} value [Strings]
     * @return {[type]}       [Adds text to textarea id=email_textarea]
     * @return {[type]}       [Adds text to textarea id=email_subject]
     */
    switch(value) {
     case 'more_edits_required':
         document.getElementById("email_textarea").value = more_edits_required_text
         document.getElementById("email_subject").value = more_edits_required_subject + pid
         break;
     case 'accepted_student_submission':
         document.getElementById("email_textarea").value = email_ACCEPT
         document.getElementById("email_subject").value = "Congratulations " + pid + congrats
         break;
     default:
         document.getElementById("email_textarea").value = dateTime;
         document.getElementById("email_subject").value = simple_required_subject + pid
     }
 }
