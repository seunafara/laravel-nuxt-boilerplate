import { defaults } from "lodash";

export default function({ store, redirect }) {
  if (store.getters["auth/authenticated"]) {
    return redirect("/");
  }
}
