
export default class OlvsDigi__selectOneField {
  constructor(pathInputs) {
    this.checks = document.querySelectorAll(pathInputs);
  }

  clear_checked(positionIgnore) {
    this.checks.forEach((input, index) => {
      if (index !== positionIgnore) input.checked = false;
    });
  }

  add_events() {
    this.checks.forEach((input, index) => {
      input.addEventListener('click', () => {
        this.clear_checked(index);
      })
    });
  }

  init() {
    if (this.checks && this.checks.length) this.add_events();
    else console.error();('Itens não encontrados');
  }
}
