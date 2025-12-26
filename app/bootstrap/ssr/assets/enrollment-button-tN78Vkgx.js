import { jsx } from "react/jsx-runtime";
import { B as Button } from "./button-jZyzwgdo.js";
import { usePage, router } from "@inertiajs/react";
import "react";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
const EnrollmentButton = ({ auth, course }) => {
  const { props } = usePage();
  const { translate } = props;
  const { frontend } = translate;
  const enrollmentHandler = (course2) => {
    var _a;
    router.post(route("enrollments.store"), {
      user_id: (_a = auth.user) == null ? void 0 : _a.id,
      course_id: course2.id,
      enrollment_type: "free"
    });
  };
  return course.pricing_type === "free" ? /* @__PURE__ */ jsx(Button, { size: "lg", className: "w-full", onClick: () => enrollmentHandler(course), children: frontend.enroll_now }) : /* @__PURE__ */ jsx("a", { href: route("payments.index", { from: "web", item: "course", id: course.id }), children: /* @__PURE__ */ jsx(Button, { size: "lg", className: "w-full", children: frontend.buy_now }) });
};
export {
  EnrollmentButton as default
};
