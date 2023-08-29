import AppStorage from "./AppStorage.js";
import Token from "./Token.js";

class User {

  hasToken() {
    const storedToken = AppStorage.getToken();

    if (storedToken) {
      return Token.isValid(storedToken) ? true : false;
    }

    return false;
  }

  loggIn() {
    return this.hasToken();
  }

  redirectToHome() {
    window.location = "/forum";
  }

  logout() {
    AppStorage.clear();
    window.location = "/";
  }

  name() {
    if (this.loggIn()) {
      return AppStorage.getUser();
    }
  }

  user() {
    if (this.loggIn()) {
      return AppStorage.getUser();
    } else {
      alert("User is not loggin");
    }
  }

  id() {
    if (this.loggIn()) {
      const token = AppStorage.getToken();
      const payload = Token.payload(token);

      if (Token.isValid(token)) {
        return payload.sub;
      }
    } else {
      alert("User is not loggin");
    }
  }

  own(username) {
    return this.user() == username;
  }
}

export default User = new User();
