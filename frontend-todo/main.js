const inputbox=document.getElementById("input-box");
const btn=document.getElementById("btn");
const tasksArea=document.getElementById("tasks-area");

const themeToggleBtn = document.getElementById("theme-toggle");
themeToggleBtn.addEventListener("click",()=>{
  document.body.classList.toggle("dark-mode");
  if(document.body.classList.contains("dark-mode")){
    themeToggleBtn.textContent="Light Mode";
  } 
  else{
    themeToggleBtn.textContent="Dark Mode";
  }
});

btn.addEventListener("click",()=>{
  const text=inputbox.value.trim();
  if(!text) return;
  const task=document.createElement("div");
  task.classList.add("task");
  const checkbox=document.createElement("input");
  checkbox.type="checkbox";
  let span=document.createElement("span");
  span.textContent=text;
  const editBtn=document.createElement("button");
  editBtn.textContent="Edit";
  editBtn.classList.add("edit-btn");
  editBtn.addEventListener("click",()=>{
    const currentChild=task.querySelector("span, input[type='text']");
    if (currentChild.tagName==="SPAN"){
      const editInput=document.createElement("input");
      editInput.type="text";
      editInput.value=currentChild.textContent;
      task.replaceChild(editInput,currentChild);
      editInput.focus();
    } 
    else{
      const newSpan=document.createElement("span");
      newSpan.textContent=currentChild.value.trim() || text;
      task.replaceChild(newSpan,currentChild);
      span=newSpan;
    }
  });
  checkbox.addEventListener("change",()=>{
    task.classList.toggle("task-completed",checkbox.checked);
  });
  task.appendChild(checkbox);
  task.appendChild(span);
  task.appendChild(editBtn);
  tasksArea.appendChild(task);
  inputbox.value="";
  
  const deleteBtn=document.createElement("button");
  deleteBtn.textContent="Delete";
  deleteBtn.classList.add("delete-btn");
  deleteBtn.addEventListener("click",()=>{
  task.remove();
  });
  task.appendChild(deleteBtn);
});