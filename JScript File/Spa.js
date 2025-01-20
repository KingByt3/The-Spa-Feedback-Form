document.addEventListener('DOMContentLoaded', function() {
  const nameInput = document.querySelector('input[name="TheraName"]')

  nameInput.addEventListener('input', function() {
    const value = nameInput.value;
    const filteredValue = value.replace(/[^a-zA-Z\.\-\ ]/g, '');
    if (value !== filteredValue) {
      nameInput.value = filteredValue;
    }
    if (nameInput.value.length > 30) {
      nameInput.value = nameInput.value.slice(0, 30);
    }
  });
});

document.addEventListener('DOMContentLoaded', function() {
  const nameInput = document.querySelector('input[name="Gname"]')

  nameInput.addEventListener('input', function() {
    const value = nameInput.value;
    const filteredValue = value.replace(/[^a-zA-Z\.\-\ ]/g, '');
    if (value !== filteredValue) {
      nameInput.value = filteredValue;
    }
    if (nameInput.value.length > 30) {
      nameInput.value = nameInput.value.slice(0, 30);
    }
  });
});


document.addEventListener('DOMContentLoaded', function() {
  const nameInput = document.querySelector('input[name="RoomNum"]')

  nameInput.addEventListener('input', function() {
    const value = nameInput.value;
    const filteredValue = value.replace(/[^0-9]+/g, '');
    if (value !== filteredValue) {
      nameInput.value = filteredValue;
    }
    if (nameInput.value.length > 5) {
      nameInput.value = nameInput.value.slice(0, 5);
    }
  });
});