import { jsxs, jsx } from "react/jsx-runtime";
import { C as Combobox } from "./combobox-CtfF3flG.js";
import { I as InputError } from "./input-error-CEW4jhey.js";
import { L as LoadingButton } from "./loading-button-C4Hk_jCd.js";
import { D as Dialog, a as DialogTrigger, b as DialogContent, c as DialogHeader, d as DialogTitle } from "./dialog-DD5SXV81.js";
import { L as Label } from "./label-Dd_w2I6M.js";
import { R as RadioGroup, a as RadioGroupItem } from "./radio-group-sSS5HHUP.js";
import { S as ScrollArea } from "./scroll-area-DPHRDnwL.js";
import { usePage, useForm } from "@inertiajs/react";
import { useState } from "react";
import "./button-jZyzwgdo.js";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
import "cmdk";
import "lucide-react";
import "./popover-BV7JTqNd.js";
import "@radix-ui/react-popover";
import "@radix-ui/react-dialog";
import "@radix-ui/react-label";
import "@radix-ui/react-radio-group";
import "@radix-ui/react-scroll-area";
const EnrollmentModal = ({ type, title, handler }) => {
  const [open, setOpen] = useState(false);
  const { users, exams, courses, prices, translate } = usePage().props;
  const { input, button } = translate;
  const { data, setData, post, reset, errors, processing } = useForm({
    user_id: "",
    exam_id: "",
    course_id: "",
    enrollment_type: "free"
  });
  const handleSubmit = (e) => {
    e.preventDefault();
    if (type === "exam") {
      post(route("exam-enrollments.store"), {
        onSuccess: () => {
          reset();
          setOpen(false);
        }
      });
    } else {
      post(route("enrollments.store"), {
        onSuccess: () => {
          reset();
          setOpen(false);
        }
      });
    }
  };
  const transformedUsers = users.map((user) => ({
    label: user.name,
    value: user.id
  }));
  const transformedExams = type === "exam" ? exams.map((exam) => ({
    label: exam.title,
    value: exam.id
  })) : [];
  const transformedCourses = type === "course" ? courses.map((course) => ({
    label: course.title,
    value: course.id
  })) : [];
  return /* @__PURE__ */ jsxs(Dialog, { open, onOpenChange: setOpen, children: [
    /* @__PURE__ */ jsx(DialogTrigger, { asChild: true, children: handler }),
    /* @__PURE__ */ jsx(DialogContent, { className: "p-0", children: /* @__PURE__ */ jsxs(ScrollArea, { className: "max-h-[90vh] p-6", children: [
      /* @__PURE__ */ jsx(DialogHeader, { className: "mb-6", children: /* @__PURE__ */ jsx(DialogTitle, { children: title }) }),
      /* @__PURE__ */ jsxs("form", { onSubmit: handleSubmit, className: "space-y-6", children: [
        /* @__PURE__ */ jsxs("div", { children: [
          /* @__PURE__ */ jsx(Label, { children: "Select User" }),
          /* @__PURE__ */ jsx(
            Combobox,
            {
              data: transformedUsers,
              defaultValue: data.user_id,
              placeholder: input.select,
              onSelect: (selected) => setData("user_id", selected.value)
            }
          ),
          /* @__PURE__ */ jsx(InputError, { message: errors.user_id })
        ] }),
        /* @__PURE__ */ jsxs("div", { children: [
          /* @__PURE__ */ jsx(Label, { children: type === "exam" ? "Select Exam" : "Select Course" }),
          /* @__PURE__ */ jsx(
            Combobox,
            {
              data: type === "exam" ? transformedExams : transformedCourses,
              defaultValue: data.course_id,
              placeholder: type === "exam" ? "Select Exam" : "Select Course",
              onSelect: (selected) => setData(type === "exam" ? "exam_id" : "course_id", selected.value)
            }
          ),
          /* @__PURE__ */ jsx(InputError, { message: errors[type === "exam" ? "exam_id" : "course_id"] })
        ] }),
        /* @__PURE__ */ jsxs("div", { children: [
          /* @__PURE__ */ jsx(Label, { children: input.enrollment_type }),
          /* @__PURE__ */ jsx(
            RadioGroup,
            {
              defaultValue: data.enrollment_type,
              className: "flex items-center space-x-4 pt-2 pb-1",
              onValueChange: (value) => setData("enrollment_type", value),
              children: prices.map((price) => /* @__PURE__ */ jsxs("div", { className: "flex items-center space-x-2", children: [
                /* @__PURE__ */ jsx(RadioGroupItem, { className: "cursor-pointer", id: price, value: price }),
                /* @__PURE__ */ jsx(Label, { htmlFor: price, className: "capitalize", children: price })
              ] }, price))
            }
          ),
          /* @__PURE__ */ jsx(InputError, { message: errors.enrollment_type })
        ] }),
        /* @__PURE__ */ jsx("div", { className: "col-span-2 mt-6 text-right", children: /* @__PURE__ */ jsx(LoadingButton, { loading: processing, children: button.submit }) })
      ] })
    ] }) })
  ] });
};
export {
  EnrollmentModal as default
};
