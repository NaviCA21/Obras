<template>
    <div
        class="contenair bg-cover min-h-screen w-full flex justify-center items-center"
        style="background-image: url('https://images.unsplash.com/photo-1519681393784-d120267933ba?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1124&q=100');'"
    >
        <!-- card -->
        <div
            class="w-1/2 bg-white p-5 rounded-xl bg-opacity-60 backdrop-filter backdrop-blur-lg"
        >
            <div class="header-card flex justify-between font-semibold">
                <div class="">Team members</div>
                <div class="flex items-center gap-x-1 text-sm text-blue-500">
                    <svg
                        class="h-4 w-4 fill-current"
                        xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24"
                    >
                        <path fill="none" d="M0 0h24v24H0z" />
                        <path
                            d="M1.181 12C2.121 6.88 6.608 3 12 3c5.392 0 9.878 3.88 10.819 9-.94 5.12-5.427 9-10.819 9-5.392 0-9.878-3.88-10.819-9zM12 17a5 5 0 1 0 0-10 5 5 0 0 0 0 10zm0-2a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"
                        />
                    </svg>
                    <span>See all</span>
                </div>
            </div>
            <!-- end header -->

            <div class="card-content divide-y flex flex-col gap-y-3 mt-5">
                <div
                    class="card-content-profil flex justify-between items-center"
                >
                    <div class="flex gap-x-2 items-center">
                        <img
                            class="avatar h-10 w-10 rounded-full border-4 border-opacity-40"
                            src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAASABIAAD/4QCuRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgExAAIAAAAhAAAAWodpAAQAAAABAAAAfAAAAAAAAABIAAAAAQAAAEgAAAABQWRvYmUgUGhvdG9zaG9wIDIxLjAgKE1hY2ludG9zaCkAAAADoAEAAwAAAAEAAQAAoAIABAAAAAEAAABAoAMABAAAAAEAAABAAAAAAP/hC1lodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IlhNUCBDb3JlIDYuMC4wIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6RDM4NzEyOTk1NEU1MTFFQkE5NUFBNDNDN0ExMTE5QUMiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6RDM4NzEyOTg1NEU1MTFFQkE5NUFBNDNDN0ExMTE5QUMiIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDo3NTAxMDgwNDEyMTAxMUVBOTNGNUU1NkMyNEY0RUY2MCIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgMjEuMCAoTWFjaW50b3NoKSI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjUzZDhlNGZmLWRkMDctNDQxZC04ZDlhLTRhNjcxYmI5OGMzNyIgc3RSZWY6ZG9jdW1lbnRJRD0iYWRvYmU6ZG9jaWQ6cGhvdG9zaG9wOjY5ZWQxZGVkLTZmNzYtNWM0MS1iZGIwLWU0OWNkMjVjYzhlMyIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8P3hwYWNrZXQgZW5kPSJ3Ij8+AP/tADhQaG90b3Nob3AgMy4wADhCSU0EBAAAAAAAADhCSU0EJQAAAAAAENQdjNmPALIE6YAJmOz4Qn7/wAARCABAAEADASIAAhEBAxEB/8QAHwAAAQUBAQEBAQEAAAAAAAAAAAECAwQFBgcICQoL/8QAtRAAAgEDAwIEAwUFBAQAAAF9AQIDAAQRBRIhMUEGE1FhByJxFDKBkaEII0KxwRVS0fAkM2JyggkKFhcYGRolJicoKSo0NTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uHi4+Tl5ufo6erx8vP09fb3+Pn6/8QAHwEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoL/8QAtREAAgECBAQDBAcFBAQAAQJ3AAECAxEEBSExBhJBUQdhcRMiMoEIFEKRobHBCSMzUvAVYnLRChYkNOEl8RcYGRomJygpKjU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6goOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4uPk5ebn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"
                            alt=""
                        />
                        <div class="card-name-user text-xs">
                            <h3 class="font-semibold">Chris Wood</h3>
                            <div class="flex items-center gap-x-1">
                                <span
                                    class="h-3 w-3 rounded-full bg-green-500"
                                ></span>
                                <span>Online</span>
                            </div>
                        </div>
                    </div>

                    <div class="card-action">
                        <button
                            class="flex items-center px-2 py-1 text-xs text-white bg-gray-500 hover:bg-gray-600"
                        >
                            <svg
                                class="w-3 h-3"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"
                                ></path>
                            </svg>
                            <span class="">Invite</span>
                        </button>
                    </div>
                </div>

                <div
                    class="card-content-profil pt-3 flex justify-between items-center"
                >
                    <div class="flex gap-x-2 items-center">
                        <img
                            class="avatar h-10 w-10 rounded-full border-4 border-opacity-40"
                            src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAASABIAAD/4QCuRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgExAAIAAAAhAAAAWodpAAQAAAABAAAAfAAAAAAAAABIAAAAAQAAAEgAAAABQWRvYmUgUGhvdG9zaG9wIDIxLjAgKE1hY2ludG9zaCkAAAADoAEAAwAAAAEAAQAAoAIABAAAAAEAAADAoAMABAAAAAEAAADAAAAAAP/hC1lodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IlhNUCBDb3JlIDYuMC4wIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6RDM4NzEyOUQ1NEU1MTFFQkE5NUFBNDNDN0ExMTE5QUMiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6RDM4NzEyOUM1NEU1MTFFQkE5NUFBNDNDN0ExMTE5QUMiIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDo3NTAxMDgwNDEyMTAxMUVBOTNGNUU1NkMyNEY0RUY2MCIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgMjEuMCAoTWFjaW50b3NoKSI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjUzZDhlNGZmLWRkMDctNDQxZC04ZDlhLTRhNjcxYmI5OGMzNyIgc3RSZWY6ZG9jdW1lbnRJRD0iYWRvYmU6ZG9jaWQ6cGhvdG9zaG9wOjY5ZWQxZGVkLTZmNzYtNWM0MS1iZGIwLWU0OWNkMjVjYzhlMyIvPiA8L3JkZjpEZXNjcmlwdGlvbj4gPC9yZGY6UkRGPiA8L3g6eG1wbWV0YT4gICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICA8P3hwYWNrZXQgZW5kPSJ3Ij8+AP/tADhQaG90b3Nob3AgMy4wADhCSU0EBAAAAAAAADhCSU0EJQAAAAAAENQdjNmPALIE6YAJmOz4Qn7/wAARCADAAMADASIAAhEBAxEB/8QAHwAAAQUBAQEBAQEAAAAAAAAAAAECAwQFBgcICQoL/8QAtRAAAgEDAwIEAwUFBAQAAAF9AQIDAAQRBRIhMUEGE1FhByJxFDKBkaEII0KxwRVS0fAkM2JyggkKFhcYGRolJicoKSo0NTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqDhIWGh4iJipKTlJWWl5iZmqKjpKWmp6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uHi4+Tl5ufo6erx8vP09fb3+Pn6/8QAHwEAAwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoL/8QAtREAAgECBAQDBAcFBAQAAQJ3AAECAxEEBSExBhJBUQdhcRMiMoEIFEKRobHBCSMzUvAVYnLRChYkNOEl8RcYGRomJygpKjU2Nzg5OkNERUZHSElKU1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6goOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4uPk5ebn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"
                            alt=""
                        />
                        <div class="card-name-user text-xs">
                            <h3 class="font-semibold">Jose Leos</h3>
                            <div class="flex items-center gap-x-1">
                                <span
                                    class="h-3 w-3 rounded-full bg-yellow-500"
                                ></span>
                                <span>Busy</span>
                            </div>
                        </div>
                    </div>

                    <div class="card-action">
                        <button
                            class="flex items-center px-2 py-1 text-xs text-white bg-green-500 hover:bg-green-600"
                        >
                            <svg
                                class="w-3 h-3"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"
                                ></path>
                            </svg>
                            <span class="">Invite</span>
                        </button>
                    </div>
                </div>

                <div
                    class="card-content-profil pt-3 flex justify-between items-center"
                >
                    <div class="flex gap-x-2 items-center">
                        <img
                            class="avatar h-10 w-10 rounded-full border-4 border-opacity-40"
                            src="https://ui.glass/generator/static/profile-picture-3-b701fcb37cb1fef6a7e720dccd16e4c0.jpg"
                            alt=""
                        />
                        <div class="card-name-user text-xs">
                            <h3 class="font-semibold">Jeny Green</h3>
                            <div class="flex items-center gap-x-1">
                                <span
                                    class="h-3 w-3 rounded-full bg-red-500"
                                ></span>
                                <span>Offline</span>
                            </div>
                        </div>
                    </div>

                    <div class="card-action">
                        <button
                            class="flex items-center px-2 py-1 text-xs text-white bg-green-500 hover:bg-green-600"
                        >
                            <svg
                                class="w-3 h-3"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"
                                ></path>
                            </svg>
                            <span class="">Invite</span>
                        </button>
                    </div>
                </div>

                <div
                    class="card-content-profil pt-3 flex justify-between items-center"
                >
                    <div class="flex gap-x-2 items-center">
                        <img
                            class="avatar h-10 w-10 rounded-full border-4 border-opacity-40"
                            src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAASABIAAD/4QCuRXhpZgAATU0AKgAAAAgABQESAAMAAAABAAEAAAEaAAUAAAABAAAASgEbAAUAAAABAAAAUgExAAIAAAAhAAAAWodpAAQAAAABAAAAfAAAAAAAAABIAAAAAQAAAEgAAAABQWRvYmUgUGhvdG9zaG9wIDIxLjAgKE1hY2ludG9zaCkAAAADoAEAAwAAAAEAAQAAoAIABAAAAAEAAABAoAMABAAAAAEAAABAAAAAAP/hC0NodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IlhNUCBDb3JlIDYuMC4wIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bWxuczp4bXA9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC8iIHhtcE1NOkRvY3VtZW50SUQ9InhtcC5kaWQ6RDNFMzkyREQ2MkY2MTFFQkJBQUI4RThDNTFDQzgyODgiIHhtcE1NOkluc3RhbmNlSUQ9InhtcC5paWQ6RDNFMzkyREM2MkY2MTFFQkJBQUI4RThDNTFDQzgyODgiIHhtcE1NOk9yaWdpbmFsRG9jdW1lbnRJRD0ieG1wLmRpZDo3NTAxMDgwNDEyMTAxMUVBOTNGNUU1NkMyNEY0RUY2MCIgeG1wOkNyZWF0b3JUb29sPSJBZG9iZSBQaG90b3Nob3AgMjEuMCAoTWFjaW50b3NoKSI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOkQzODcxMkEwNTRFNTExRUJBOTVBQTQzQzdBMTExOUFDIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOkQzODcxMkExNTRFNTExRUJBOTVBQTQzQzdBMTExOUFDIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgICAgIDw/eHBhY2tldCBlbmQ9InciPz4A/+0AOFBob3Rvc2hvcCAzLjAAOEJJTQQEAAAAAAAAOEJJTQQlAAAAAAAQ1B2M2Y8AsgTpgAmY7PhCfv/AABEIAEAAQAMBEQACEQEDEQH/xAAfAAABBQEBAQEBAQAAAAAAAAAAAQIDBAUGBwgJCgv/xAC1EAACAQMDAgQDBQUEBAAAAX0BAgMABBEFEiExQQYTUWEHInEUMoGRoQgjQrHBFVLR8CQzYnKCCQoWFxgZGiUmJygpKjQ1Njc4OTpDREVGR0hJSlNUVVZXWFlaY2RlZmdoaWpzdHV2d3h5eoOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tba3uLm6wsPExcbHyMnK0tPU1dbX2Nna4eLj5OXm5+jp6vHy8/T19vf4+fr/xAAfAQADAQEBAQEBAQEBAAAAAAAAAQIDBAUGBwgJCgv/xAC1EQACAQIEBAMEBwUEBAABAncAAQIDEQQFITEGEkFRB2FxEyIygQgUQpGhscEJIzNS8BVictEKFiQ04SXxFxgZGiYnKCkqNTY3ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqCg4SFhoeIiYqSk5SVlpeYmZqio6Slpqeoqaqys7S1tre4ubrCw8TFxsfIycrS09TV1tfY2dri4+Tl5ufo6ery8/T19vf4+fr/2wBDAAYEBAQF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"
                            alt=""
                        />
                        <div class="card-name-user text-xs">
                            <h3 class="font-semibold">Neil Sims</h3>
                            <div class="flex items-center gap-x-1">
                                <span
                                    class="h-3 w-3 rounded-full bg-green-500"
                                ></span>
                                <span>Online</span>
                            </div>
                        </div>
                    </div>

                    <div class="card-action">
                        <button
                            class="flex items-center px-2 py-1 text-xs text-white bg-green-500 hover:bg-green-600"
                        >
                            <svg
                                class="w-3 h-3"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"
                                ></path>
                            </svg>
                            <span class="">Invite</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- BUY ME A BEER AND HELP SUPPORT OPEN-SOURCE RESOURCES -->
        <div
            class="flex items-end justify-end fixed bottom-0 right-0 mb-4 mr-4 z-10"
        >
            <div>
                <a
                    title="Buy me a beer"
                    href="https://www.buymeacoffee.com/emichel"
                    target="_blank"
                    class="block w-16 h-16 rounded-full transition-all shadow hover:shadow-lg transform hover:scale-110 hover:rotate-12"
                >
                    <img
                        class="object-cover object-center w-full h-full rounded-full"
                        src="https://i.pinimg.com/originals/60/fd/e8/60fde811b6be57094e0abc69d9c2622a.jpg"
                    />
                </a>
            </div>
        </div>
    </div>
</template>
