const showListBtn = document.getElementById('showListBtn');
const showAddBtn = document.getElementById('showAddBtn');
const listForm = document.getElementById('listForm');
const addForm = document.getElementById('addForm');

showListBtn.addEventListener('click', () => {
  listForm.classList.add('active');
  addForm.classList.remove('active');
  showListBtn.classList.add('active');
  showAddBtn.classList.remove('active');
});

showAddBtn.addEventListener('click', () => {
  addForm.classList.add('active');
  listForm.classList.remove('active');
  showListBtn.classList.remove('active');
  showAddBtn.classList.add('active');
});

