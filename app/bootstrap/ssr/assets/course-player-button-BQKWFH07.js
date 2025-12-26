import { jsx, jsxs, Fragment } from "react/jsx-runtime";
import { B as Button } from "./button-jZyzwgdo.js";
import { usePage, Link, router } from "@inertiajs/react";
import "react";
import "@radix-ui/react-slot";
import "class-variance-authority";
import "./utils-BmtPBcb0.js";
import "clsx";
import "tailwind-merge";
const EnabledPlayButton = ({ watchHistory }) => {
  const { props } = usePage();
  const { translate } = props;
  const { frontend } = translate;
  return /* @__PURE__ */ jsx(Button, { size: "lg", className: "w-full", asChild: true, children: /* @__PURE__ */ jsx(
    Link,
    {
      href: route("course.player", {
        type: watchHistory.current_watching_type,
        watch_history: watchHistory.id,
        lesson_id: watchHistory.current_watching_id
      }),
      children: frontend.play_course
    }
  ) });
};
const DisabledPlayButton = ({ course, approvalStatus }) => {
  const { props } = usePage();
  const { translate } = props;
  const { frontend } = translate;
  const approve_able = approvalStatus.approve_able;
  return approve_able ? /* @__PURE__ */ jsx(Button, { size: "lg", className: "w-full", onClick: () => router.post(route("player.init.watch-history"), { course_id: course.id }), children: frontend.play_course }) : /* @__PURE__ */ jsx(Button, { disabled: true, size: "lg", className: "w-full", children: frontend.course_player });
};
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
const EnrollOrPlayerButton = () => {
  const { auth, course, enrollment, watchHistory, approvalStatus, wishlists, translate } = usePage().props;
  const { frontend } = translate;
  const isEnrolled = !!enrollment;
  const hasWatchHistory = !!watchHistory;
  const isAdminOrInstructor = auth.user && ["admin", "instructor"].includes(auth.user.role);
  const canPlay = hasWatchHistory && (isAdminOrInstructor || isEnrolled);
  const isWishlisted = wishlists.find((wishlist) => wishlist.course_id === course.id);
  const handleWishlist = () => {
    var _a;
    if (isWishlisted) {
      router.delete(route("course-wishlists.destroy", { id: isWishlisted.id }));
    } else {
      router.post(route("course-wishlists.store", { user_id: (_a = auth.user) == null ? void 0 : _a.id, course_id: course.id }));
    }
  };
  if (canPlay) {
    return /* @__PURE__ */ jsx(EnabledPlayButton, { watchHistory });
  } else if (isAdminOrInstructor) {
    return /* @__PURE__ */ jsx(DisabledPlayButton, { course, approvalStatus });
  } else {
    return /* @__PURE__ */ jsxs(Fragment, { children: [
      /* @__PURE__ */ jsx(Button, { className: "w-full px-1 sm:px-3", variant: "outline", size: "lg", onClick: handleWishlist, children: isWishlisted ? frontend.remove_from_wishlist : frontend.add_to_wishlist }),
      /* @__PURE__ */ jsx(EnrollmentButton, { auth, course })
    ] });
  }
};
export {
  EnrollOrPlayerButton as default
};
