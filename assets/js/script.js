document.getElementById("ExamForm").addEventListener("submit", function(event){
         event.preventDefault();


         const name=document.getElementById("name").value.trim();
         const collegeId=document.getElementById("collegeId").value.trim();
         const stream=document.getElementById("stream").value.trim();
         const error=document.getElementById("errorMessage");
         if(name===""|| stream===""||collegeId===""){
            error.textContent="All fields are required";
            return;
         }
         if(collegeId.length< 4){
            error.textContent="College ID must be atleast 4 characters long";
            return;
         }
         error.style.color="green";
         error.textContent="Submitted Successfully!. Good luck for your exam";
         setTimeout(()=>{
            document.getElementById("ExamForm").submit();

         },800);
;})
