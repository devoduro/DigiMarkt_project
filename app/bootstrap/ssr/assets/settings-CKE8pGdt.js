import { jsx, jsxs } from "react/jsx-runtime";
import { I as InputError } from "./input-error-CEW4jhey.js";
import { L as LoadingButton } from "./loading-button-C4Hk_jCd.js";
import { C as Card } from "./card-D8SB2yrw.js";
import { I as Input } from "./input-C6-Ta46A.js";
import { L as Label } from "./label-Dd_w2I6M.js";
import { usePage, useForm } from "@inertiajs/react";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "lucide-react";
import "react";
import "./button-jZyzwgdo.js";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "@radix-ui/react-label";
const ExamSettings = () => {
  const { props } = usePage();
  const { tab, exam } = props;
  const { data, setData, post, errors, processing } = useForm({
    tab,
    duration_hours: exam.duration_hours || 1,
    duration_minutes: exam.duration_minutes || 0,
    pass_mark: exam.pass_mark || 50,
    max_attempts: exam.max_attempts || 3,
    total_marks: exam.total_marks || 100
  });
  const handleSubmit = (e) => {
    e.preventDefault();
    post(route("exams.update", { exam: exam.id }));
  };
  return /* @__PURE__ */ jsx(Card, { className: "container p-4 sm:p-6", children: /* @__PURE__ */ jsxs("form", { onSubmit: handleSubmit, className: "space-y-4", children: [
    /* @__PURE__ */ jsxs("div", { className: "grid gap-6 md:grid-cols-2", children: [
      /* @__PURE__ */ jsxs("div", { children: [
        /* @__PURE__ */ jsx(Label, { children: "Duration (Hours) *" }),
        /* @__PURE__ */ jsx(
          Input,
          {
            type: "number",
            name: "duration_hours",
            value: data.duration_hours.toString(),
            onChange: (e) => setData("duration_hours", parseInt(e.target.value) || 0),
            placeholder: "1",
            min: "0"
          }
        ),
        /* @__PURE__ */ jsx(InputError, { message: errors.duration_hours })
      ] }),
      /* @__PURE__ */ jsxs("div", { children: [
        /* @__PURE__ */ jsx(Label, { children: "Duration (Minutes) *" }),
        /* @__PURE__ */ jsx(
          Input,
          {
            type: "number",
            name: "duration_minutes",
            value: data.duration_minutes.toString(),
            onChange: (e) => setData("duration_minutes", parseInt(e.target.value) || 0),
            placeholder: "0",
            min: "0",
            max: "59"
          }
        ),
        /* @__PURE__ */ jsx(InputError, { message: errors.duration_minutes })
      ] }),
      /* @__PURE__ */ jsxs("div", { children: [
        /* @__PURE__ */ jsx(Label, { children: "Pass Mark *" }),
        /* @__PURE__ */ jsx(
          Input,
          {
            type: "number",
            name: "pass_mark",
            value: data.pass_mark.toString(),
            onChange: (e) => setData("pass_mark", parseInt(e.target.value) || 0),
            placeholder: "50",
            min: "0",
            max: "100"
          }
        ),
        /* @__PURE__ */ jsx(InputError, { message: errors.pass_mark }),
        /* @__PURE__ */ jsx("p", { className: "mt-1 text-xs text-gray-500", children: "Students must score this percentage to pass" })
      ] }),
      /* @__PURE__ */ jsxs("div", { children: [
        /* @__PURE__ */ jsx(Label, { children: "Max Attempts *" }),
        /* @__PURE__ */ jsx(
          Input,
          {
            type: "number",
            name: "max_attempts",
            value: data.max_attempts.toString(),
            onChange: (e) => setData("max_attempts", parseInt(e.target.value) || 1),
            placeholder: "3",
            min: "1"
          }
        ),
        /* @__PURE__ */ jsx(InputError, { message: errors.max_attempts }),
        /* @__PURE__ */ jsx("p", { className: "mt-1 text-xs text-gray-500", children: "Maximum number of attempts allowed per student" })
      ] }),
      /* @__PURE__ */ jsxs("div", { children: [
        /* @__PURE__ */ jsx(Label, { children: "Total Marks *" }),
        /* @__PURE__ */ jsx(
          Input,
          {
            type: "number",
            name: "total_marks",
            value: data.total_marks.toString(),
            onChange: (e) => setData("total_marks", parseInt(e.target.value) || 1),
            placeholder: "100",
            min: "1"
          }
        ),
        /* @__PURE__ */ jsx(InputError, { message: errors.total_marks }),
        /* @__PURE__ */ jsx("p", { className: "mt-1 text-xs text-gray-500", children: "Total marks for the entire exam" })
      ] })
    ] }),
    /* @__PURE__ */ jsx("div", { className: "mt-8", children: /* @__PURE__ */ jsx(LoadingButton, { loading: processing, children: "Save Changes" }) })
  ] }) });
};
export {
  ExamSettings as default
};
