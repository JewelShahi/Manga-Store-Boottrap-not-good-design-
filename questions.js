document.addEventListener("DOMContentLoaded", () => {
  const tableBody = document.querySelector("#questionsTable tbody");

  for (let i = 0; i < localStorage.length; i++) {
    const key = localStorage.key(i);
    if (key.startsWith("questionsData")) {
      const questionsDataString = localStorage.getItem(key);
      const questionsData = questionsDataString
        ? JSON.parse(questionsDataString)
        : null;
      if (questionsData) {
        const newRow = tableBody.insertRow();
        Object.values(questionsData).forEach((value) => {
          const cell = newRow.insertCell();
          cell.textContent = value;
        });

        const deleteCell = newRow.insertCell();
        const deleteButton = document.createElement("button");
        deleteButton.textContent = "Delete";
        deleteButton.className = "delete-btn";
        deleteButton.onclick = function () {
          tableBody.removeChild(newRow);

          localStorage.removeItem(key);
        };
        deleteCell.appendChild(deleteButton);
      }
    }
  }
});
