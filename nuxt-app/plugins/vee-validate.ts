// plugins/vee-validate.ts
import { defineNuxtPlugin } from "#app";
import { defineRule, configure } from "vee-validate";
import { required } from "@vee-validate/rules";
import { localize } from "@vee-validate/i18n";
import ja from "@vee-validate/i18n/dist/locale/ja.json";

// 'required' ルールを定義
const customJa = {
  ...ja,
  messages: {
    ...ja.messages,
    required: "このフィールドは必ず入力してください。",
    // 他のルールも必要に応じて上書き可能です
  },
};

// required ルールを登録
defineRule("required", required);

// ローカライズの設定
configure({
  generateMessage: localize("ja", customJa),
});

export default defineNuxtPlugin(() => {
  // このプラグインは自動的に実行されます
});
