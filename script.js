const form = document.querySelector("#tasks-form");

form.addEventListener("submit", e => {
  e.preventDefault();

  const titleInput = e.target.querySelector("input#title-card").value;
  const descriptionInput = e.target.querySelector("input#description-card").value;

  try {
    fetch("http://localhost/gerenciador-tarefas/addTask.php", {
      method: "POST",
      body: JSON.stringify({
        title: titleInput,
        description: descriptionInput
      }),
      headers: {
        "Content-Type": "application/json"
      }
    })
    .then(response => response.json())
    .then(data => {
      if (data.success) {
        console.log('data ==>', data);
      }
    })
  } catch (error) {
    console.log('error on trying to CREATE tasks: ', error);
  }
});

const getAllTasks = () => {
  try {
    fetch("http://localhost/gerenciador-tarefas/getTasks.php")
    .then(response => response.json())
    .then((data) => {
      const {tasks = []} = data;
      if (!tasks.length) return;

      const tasksList = document.querySelector(".grid.tasks-list");

      tasks.forEach(({title, description, id}) => {
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
    })
  } catch (error) {
    console.log('error on trying to GET tasks: ', error);
  }
}

getAllTasks();