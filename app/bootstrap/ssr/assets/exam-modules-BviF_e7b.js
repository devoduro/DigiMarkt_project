import { jsx, Fragment, jsxs } from "react/jsx-runtime";
import { A as Accordion, a as AccordionItem, b as AccordionTrigger, c as AccordionContent } from "./accordion-DVAMjldm.js";
import { usePage } from "@inertiajs/react";
import "react";
import "@radix-ui/react-accordion";
import "lucide-react";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
const ExamModules = () => {
  var _a, _b;
  const { props } = usePage();
  const { modules } = props;
  return /* @__PURE__ */ jsx(Fragment, { children: modules && modules.length > 0 ? /* @__PURE__ */ jsx(Accordion, { type: "single", collapsible: true, className: "space-y-4", defaultValue: (_b = (_a = modules[0]) == null ? void 0 : _a.id) == null ? void 0 : _b.toString(), children: modules.map((module, ind) => {
    var _a2;
    return /* @__PURE__ */ jsxs(AccordionItem, { value: ((_a2 = module.id) == null ? void 0 : _a2.toString()) || ind.toString(), className: "overflow-hidden rounded-lg border", children: [
      /* @__PURE__ */ jsxs(AccordionTrigger, { className: "[&[data-state=open]]:!bg-muted px-4 py-3 text-base hover:no-underline", children: [
        ind + 1,
        ". ",
        module.title
      ] }),
      /* @__PURE__ */ jsx(AccordionContent, { className: "space-y-2 p-2", children: module.questions && module.questions.length > 0 ? /* @__PURE__ */ jsx("div", { className: "space-y-2", children: module.questions.map((question, qInd) => /* @__PURE__ */ jsx("div", { className: "rounded-md border p-3", children: /* @__PURE__ */ jsx("div", { className: "flex items-start justify-between", children: /* @__PURE__ */ jsxs("div", { className: "flex-1", children: [
        /* @__PURE__ */ jsxs("p", { className: "text-sm font-medium", children: [
          "Question ",
          qInd + 1,
          ": ",
          question.title
        ] }),
        /* @__PURE__ */ jsxs("p", { className: "text-muted-foreground mt-1 text-xs", children: [
          "Type: ",
          question.question_type,
          " | Marks: ",
          question.marks
        ] })
      ] }) }) }, question.id)) }) : /* @__PURE__ */ jsx("div", { className: "px-4 py-3 text-center", children: /* @__PURE__ */ jsx("p", { children: "No questions in this module" }) }) })
    ] }, module.id);
  }) }) : /* @__PURE__ */ jsx("div", { className: "p-6 text-center", children: /* @__PURE__ */ jsx("p", { children: "No modules available for this exam" }) }) });
};
export {
  ExamModules as default
};
