const form = document.querySelector("#tasks-form");
const titleInput = form.querySelector("input#title-card")

const addTaskOnList = (taskArr) => {
  const tasksList = document.querySelector(".grid.tasks-list");

  taskArr.forEach(({ title, description, id }) => {
    const linkElement = document.createElement("a");
    linkElement.classList.add("card");
    linkElement.setAttribute("title", id);

    const titleElement = document.createElement("h3");
    titleElement.classList.add("card__title");
    titleElement.textContent = title;

    const subtitleElement = document.createElement("p");
    subtitleElement.classList.add("card__subtitle");
    subtitleElement.textContent = description;

    const btnGroup = `<span class="btn-group">
    <button class="inline-block border-e p-3 text-gray-700 bg-blue-400 hover:brightness-[0.8] focus:relative cursor-pointer" title="Edit Product" onclick="editCard(this)">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"></path>
      </svg>
    </button>

    <button class="inline-block p-3 text-gray-700 bg-red-500 hover:brightness-[0.8] focus:relative cursor-pointer" title="Delete Product" onclick="deleteCard(this)">
      <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-4">
        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"></path>
      </svg>
    </button></span>`

    linkElement.appendChild(titleElement);
    linkElement.appendChild(subtitleElement);
    linkElement.innerHTML += btnGroup;

    tasksList.appendChild(linkElement);
  });

  form.reset();
  titleInput.focus();
}

form.addEventListener("submit", e => {
  e.preventDefault();

  const titleValue = titleInput.value;
  const descriptionValue = e.target.querySelector("input#description-card").value;

  try {
    fetch("http://localhost/gerenciador-tarefas/tasks/addTask.php", {
      method: "POST",
      body: JSON.stringify({
        title: titleValue,
        description: descriptionValue
      }),
      headers: {
        "Content-Type": "application/json"
      }
    })
      .then(response => response.json())
      .then(data => {
        if (data.success) {
          addTaskOnList([data.task]);

          const noTaskWarning = document.querySelector("strong.no-task-warning");
          noTaskWarning.classList.toggle("hidden");
        }
      })
  } catch (error) {
    console.log('error on trying to CREATE tasks: ', error);
  }
});

const getAllTasks = () => {
  try {
    fetch("http://localhost/gerenciador-tarefas/tasks/getTasks.php")
      .then(response => response.json())
      .then((data) => {
        const { tasks = [] } = data;
        if (!tasks.length) {

          const noTaskWarning = document.querySelector("strong.no-task-warning");
          noTaskWarning.classList.toggle("hidden");

          return;
        };

        addTaskOnList(tasks);
      })
  } catch (error) {
    console.log('error on trying to GET tasks: ', error);
  }
}

const editCard = (e) => {
  console.log('edite card e ==>', e);
}

const deleteCard = (e) => {
  console.log('delete card e ==>', e);
}

getAllTasks();