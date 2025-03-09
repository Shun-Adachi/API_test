// https://nuxt.com/docs/api/configuration/nuxt-config

if (
  !globalThis.crypto ||
  typeof globalThis.crypto.getRandomValues !== "function"
) {
  globalThis.crypto = require("crypto").webcrypto;
}
export default defineNuxtConfig({
  compatibilityDate: "2024-11-01",
  devtools: { enabled: true },
  components: {
    dirs: ["~/components"],
  },
  routeRules: {
    "/": { prerender: true },
  },
});
