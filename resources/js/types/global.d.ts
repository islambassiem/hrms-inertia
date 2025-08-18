import axios from "axios";
import type { route as routeFn } from 'ziggy-js';

declare global {
  interface Window {
    axios: typeof axios;
  };
  const route: typeof routeFn;
}
