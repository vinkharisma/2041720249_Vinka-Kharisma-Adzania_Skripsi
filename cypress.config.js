import { defineConfig } from "cypress";

export default defineConfig({
    viewportWidth: 1440,
    viewportHeight: 900,
    e2e: {
    setupNodeEvents(on, config) {
      // implement node event listeners here
    },
  },
});
