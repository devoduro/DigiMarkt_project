import { jsxs, jsx } from "react/jsx-runtime";
import { I as InputError } from "./input-error-CEW4jhey.js";
import { B as Button } from "./button-jZyzwgdo.js";
import { I as Input } from "./input-C6-Ta46A.js";
import { L as Label } from "./label-Dd_w2I6M.js";
import { Plus, Trash2 } from "lucide-react";
import { useEffect } from "react";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "@radix-ui/react-label";
const FillBlankForm = ({ data, setData, errors }) => {
  var _a;
  const answers = ((_a = data.options) == null ? void 0 : _a.answers) || [];
  useEffect(() => {
    if (answers.length === 0) {
      setData("options", { answers: [""] });
    }
  }, []);
  const addAnswer = () => {
    const newAnswers = [...answers, ""];
    setData("options", { answers: newAnswers });
  };
  const removeAnswer = (index) => {
    const newAnswers = answers.filter((_, i) => i !== index);
    setData("options", { answers: newAnswers });
  };
  const updateAnswer = (index, value) => {
    const newAnswers = [...answers];
    newAnswers[index] = value;
    setData("options", { answers: newAnswers });
  };
  return /* @__PURE__ */ jsxs("div", { className: "space-y-4", children: [
    /* @__PURE__ */ jsxs("div", { children: [
      /* @__PURE__ */ jsx(Label, { children: "Instructions" }),
      /* @__PURE__ */ jsxs("div", { className: "p-3 bg-blue-50 rounded-md text-sm text-blue-900", children: [
        /* @__PURE__ */ jsx("p", { className: "font-medium mb-1", children: "How to use fill-in-the-blank questions:" }),
        /* @__PURE__ */ jsx("p", { children: "1. Write your question in the title field above" }),
        /* @__PURE__ */ jsx("p", { children: "2. Use underscores (___) or brackets [blank] to mark where students should fill in answers" }),
        /* @__PURE__ */ jsx("p", { children: "3. Add the correct answer(s) below" })
      ] })
    ] }),
    /* @__PURE__ */ jsxs("div", { className: "space-y-3", children: [
      /* @__PURE__ */ jsxs("div", { className: "flex items-center justify-between", children: [
        /* @__PURE__ */ jsx(Label, { children: "Accepted Answers *" }),
        /* @__PURE__ */ jsxs(Button, { type: "button", variant: "outline", size: "sm", onClick: addAnswer, children: [
          /* @__PURE__ */ jsx(Plus, { className: "h-4 w-4" }),
          "Add Alternative Answer"
        ] })
      ] }),
      /* @__PURE__ */ jsx("p", { className: "text-sm text-gray-600", children: "Add multiple variations if there are different ways to answer correctly" }),
      answers.map((answer, index) => /* @__PURE__ */ jsxs("div", { className: "flex gap-2", children: [
        /* @__PURE__ */ jsx("div", { className: "flex-1", children: /* @__PURE__ */ jsx(Input, { placeholder: `Correct answer ${index + 1}`, value: answer, onChange: (e) => updateAnswer(index, e.target.value) }) }),
        answers.length > 1 && /* @__PURE__ */ jsx(Button, { type: "button", variant: "ghost", size: "sm", onClick: () => removeAnswer(index), className: "text-red-600", children: /* @__PURE__ */ jsx(Trash2, { className: "h-4 w-4" }) })
      ] }, index))
    ] }),
    /* @__PURE__ */ jsx(InputError, { message: errors.options })
  ] });
};
export {
  FillBlankForm as default
};
