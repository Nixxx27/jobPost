function validateUser(){
            var username = document.forms['loginForm']['username'].value;
            var password = document.forms['loginForm']['password'].value;
            if(username == null || username == ""){
                alert('Username Required');
            }else
            if(password == null || password == ""){
                alert('Password required');
            }else{
                document.getElementById("loginForm").submit();
            }

        }


function validateJob(){
            var title = document.forms['jobForm']['title'].value;
            var qualifications = document.forms['jobForm']['qualifications'].value;
            if(title == null || title == ""){
                alert('Please Provide Title for this Job');
            }else
            if(qualifications == null || qualifications == ""){
                alert('Please Provide qualifications for this Job');
            }else{
                document.getElementById("jobForm").submit();
            }

        }

function logOut(){
            var x;
            if(confirm("Are you sure you want to Log Out?")==true){
                window.location.href='logout';
            }

        }