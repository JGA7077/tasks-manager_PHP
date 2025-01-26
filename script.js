const form = document.querySelector("#tasks-form");
const titleInput = form.querySelector("input#title-card")

const addTaskOnList = (taskArr) => {
  const tasksList = document.querySelector(".grid.tasks-list");

  taskArr.forEach(({title, description, id}) => {
    const linkElement = document.createElement("a");
    linkElement.classList.add("card");
    linkElement.setAttribute("title", id);

    const titleElement = document.createElement("h3");
    titleElement.classList.add("card__title");
    titleElement.textContent = title;

    const subtitleElement = document.createElement("p");
    subtitleElement.classList.add("card__subtitle");
    subtitleElement.textContent = description;

    linkElement.appendChild(titleElement);
    linkElement.appendChild(subtitleElement);

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
      const {tasks = []} = data;
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

getAllTasks();