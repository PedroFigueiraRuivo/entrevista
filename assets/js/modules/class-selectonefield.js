
export default class OlvsDigi__selectOneField {
  constructor(pathInputs) {
    this.urlParamName = 'keyCat';
    this.checks = document.querySelectorAll(pathInputs);
  }

  clear_checked(positionIgnore) {
    this.checks.forEach((input, index) => {
      if (index !== positionIgnore) input.checked = false;
    });
  }

  set_key_url(id) {
    if (id !== 'all') {
      window.location.replace(window.location.pathname + `?${ this.urlParamName }=` + id);
      console.log(window.location.pathname );
    } else window.location.replace(window.location.pathname);
  }

  add_events() {
    this.checks.forEach((input, index) => {
      input.addEventListener('click', (e) => {
        this.clear_checked(index);
        this.set_key_url(input.id);
      })
    });
  }

  add_default_view() {
    const urlParams = new URLSearchParams(window.location.search);
    const myParam = urlParams.get(this.urlParamName);

    if (!myParam) this.checks[0].click();
    else {
      const input = document.getElementById(myParam);
      input.checked = true;
    }
  }

  init() {
    if (this.checks && this.checks.length) {
      this.add_default_view();
      this.add_events();
    }
    else console.error();('Itens não encontrados');
  }
}
