/* eslint-env browser */
/* globals LOCAL488_DIST_PATH */

/** Dynamically set absolute public path from current protocol and host */
if (LOCAL488_DIST_PATH) {
  __webpack_public_path__ = LOCAL488_DIST_PATH; // eslint-disable-line no-undef, camelcase
}
