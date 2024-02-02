$(function () {
    var apiSource = "production"; /* local, staging, production */
    var isEnvTest = window.location.href.includes("testing."),
        baseUrl = isEnvTest
            ? "https://api2.testing.joeyco.com"
            : "https://api2.joeyco.com",
        SELECTOR = {
            messageArea: ".messageArea",
            chatHeader: ".chat_header",
            chatTextarea: ".chat_textarea",
            alertMessages: ".alert_messages",
            textMessage: ".textMessageInput",
            chatCloseBtn: ".chatCloseBtn",
            chatStackedIcon: ".chat_stacked_icon",
            chatWrap: ".chat_wrap",
            endThread: ".end_thread",
            sendMsgBtn: ".send_msg_btn",
            chatMessage: "#chat_message",
            endThreadBtn: ".endThreadBtn",
            chat_user_id: '[name="chat_user_id"]',
            chat_other_user_id: '[name="chat_other_user_id"]',
            chat_thread_id: '[name="chat_thread_id"]',
            chat_user_type: '[name="chat_user_type"]',
            other_user_type: '[name="other_user_type"]',
            source: '[name="source"]',
            attachFileBtn: "#attachFileBtn",
            attachFileInput: "#attachFileInput",
            chatFiles: "#chatFiles",
            reasonCategoryDD: "#reasonCategoryDD",
            reasonDD: "#reasonDD",
            thread_list: ".thread_list",
            thread_box: ".thread_box",
            guest_chat_form: ".guest_chat_form",
            guest_chat_wrap: ".guest_chat_wrap",
        };

    let CHAT_DATA = "";
    let reasonCategories = [];
    let thread_reason_id = "";
    let userId = $("#userId").val();
    let ip_address = "127.0.0.1:";
    let socket_port = "3000";
    let localURL = ip_address + socket_port;
    let url =
        apiSource === "production"
            ? "https://joeycochat.herokuapp.com"
            : localURL;
    var GLOBAL = {
        isEmpty: function (el) {
            return !$.trim(el);
        },
        setCookie: function (name, value, days) {
            var expires = "";
            if (days) {
                var date = new Date();
                date.setTime(date.getTime() + days * 24 * 60 * 60 * 1000);
                expires = "; expires=" + date.toUTCString();
            }
            document.cookie = name + "=" + (value || "") + expires + "; path=/";
        },
        getCookie: function (name) {
            var nameEQ = name + "=";
            var ca = document.cookie.split(";");
            for (var i = 0; i < ca.length; i++) {
                var c = ca[i];
                while (c.charAt(0) == " ") c = c.substring(1, c.length);
                if (c.indexOf(nameEQ) == 0)
                    return c.substring(nameEQ.length, c.length);
            }
            return null;
        },
        removeCookie: function (name) {
            document.cookie =
                name + "=; Path=/; Expires=Thu, 01 Jan 1970 00:00:01 GMT;";
        },
    };

    var PAGE_CHAT;
    let socket = "";

    var SOCKET_OBJ = {
        connection: function () {
            var getCookieChat = GLOBAL.getCookie("chat_data");
            var chatData = JSON.parse(getCookieChat);
            if (getCookieChat && chatData.thread_id) {
                console.log("00ss01 socket connected");
                socket = io(url, {
                    query: {
                        userId: userId,
                        user: $(SELECTOR.chat_user_type).val() + userId,
                    },
                });
                PAGE_CHAT.receiveMessageFromServer();
                PAGE_CHAT.receiveEndThreadStatus();
                PAGE_CHAT.receiveAcceptThreadStatus();
            }
        },
    };
    // socket.on('connection');
    var SIN_TYPE = {
            TEMPORARY: "temporary",
            PERMANENT: "permanent",
        },
        COOKIES = {
            threadId: "threadId",
        };
    let API_ASSETS = baseUrl;
    let API_BASE_URL = `${baseUrl}/api/`;

    // --------------------- Page Login - [Start]
    var MESSAGE_TYPE = {
        TEXT: "TEXT",
        FILE: "FILE",
        DOCUMENT: "DOCUMENT",
    };
    PAGE_CHAT = {
        REASONS: {
            validateReasonCategory: function () {},
            changeReasonCategory: function () {
                $(SELECTOR.reasonCategoryDD).on("change", function () {
                    var selectedReasonCategory = $(
                            SELECTOR.reasonCategoryDD
                        ).val(),
                        reasonBySelectedCategory = reasonCategories.find(
                            (item) => item.id == selectedReasonCategory
                        ),
                        reasonsByCategory =
                            reasonBySelectedCategory.thread_reason;

                    $(SELECTOR.reasonDD).empty();
                    reasonsByCategory.map((reason) => {
                        $(SELECTOR.reasonDD).append(`
                            <option value="${reason.id}" data-reason="${reason.id}">${reason.reason}</option>
                        `);
                    });
                    PAGE_CHAT.REASONS.changeReasonDD();
                    PAGE_CHAT.REASONS.updateReasonDDValue();
                });
            },
            updateReasonDDValue: function () {
                thread_reason_id = $(SELECTOR.reasonDD).val();
            },
            changeReasonDD: function () {
                $(SELECTOR.reasonDD).on("change", function () {
                    PAGE_CHAT.REASONS.updateReasonDDValue();
                });
            },
            loadReasonCategory: function () {
                $.ajax({
                    url: API_BASE_URL + "chat/thread/reason/list",
                    type: "GET",
                    success: function (result) {
                        reasonCategories = result.body;

                        $(SELECTOR.reasonCategoryDD).empty();
                        if (reasonCategories.length) {
                            reasonCategories.map((category, index) => {
                                $(SELECTOR.reasonCategoryDD).append(`
                                <option value="${category.id}" data-categoryid="${category.id}">${category.reason}</option>
                            `);
                            });
                            PAGE_CHAT.REASONS.changeReasonCategory();
                        }
                        // $("#div1").html(result);
                    },
                    complete: function () {
                        $(SELECTOR.reasonCategoryDD).trigger("change");
                        $(SELECTOR.reasonDD).trigger("change");
                    },
                });
            },
            init: function () {
                PAGE_CHAT.REASONS.loadReasonCategory();
            },
        },
        DROPDOWN: {
            show: function (thisDDBtn) {
                thisDDBtn
                    .closest(".dd_wrap")
                    .attr("data-test", "test")
                    .addClass("open");
            },
            hide: function (thisDDBtn) {
                thisDDBtn.closest(".dd_wrap").removeClass("open");
            },
            init: function () {
                $(".dd_btn").on("click", function (e) {
                    e.preventDefault();
                    var thisDDBtn = $(this);
                    if (thisDDBtn.closest(".dd_wrap").hasClass("open")) {
                        PAGE_CHAT.DROPDOWN.hide(thisDDBtn);
                    } else {
                        PAGE_CHAT.DROPDOWN.show(thisDDBtn);
                    }
                });
            },
        },
        initData: function () {
            CHAT_DATA = {
                user_id: $('[name="chat_user_id"]').val(),
                other_user_id: $('[name="chat_other_user_id"]').val(),
                thread_id: $('[name="chat_thread_id"]').val(),
                user_type: $('[name="chat_user_type"]').val(),
                other_user_type: $('[name="other_user_type"]').val(),
                message: $('[name="chat_message"]').val(),
                source: $('[name="source"]').val(),
                message_type: MESSAGE_TYPE.TEXT,
                full_name: $('[name="guest_full_name"]').val(),
                email: $('[name="email"]').val(),
            };
        },
        checkThreadWritable: function (thread) {
            var isAccepted = thread.is_accepted,
                isThreadEnd = thread.is_thread_end;
            console.log("thread:::", thread);
            if (!isAccepted) {
                $(SELECTOR.chatTextarea).removeAttr("style");
                $(SELECTOR.alertMessages).empty();
                $(SELECTOR.endThread).hide();
                $(".not-accepted").removeClass("d-none").html(`
                    <div class="hgroup">
                        <h4 class="f14">Pending Acceptance</h4>
                        <div class="divider center md"></div>
                        <p class="f13">Its seems your ticket is not accepted by our support, It usually happen when our support team are busy in assisting other Joeys like you. We usually response to the ticket in few seconds/minutes.</p>
                    </div>
                `);
            } else if (isThreadEnd) {
                $(SELECTOR.chatTextarea).removeAttr("style");
                $(SELECTOR.alertMessages).html(`
                    <div>Ticket has been resolved</div>
                `);
                $(SELECTOR.endThread).hide();
            } else {
                $(".not-accepted").addClass("d-none");
                $(SELECTOR.alertMessages).empty();
                $(SELECTOR.chatTextarea).show();
                $(SELECTOR.endThread).show();
            }
        },
        message: {
            loadMessagesByThread: function (threadId) {
                var data = {
                    user_id: CHAT_DATA.user_id,
                    user_type: CHAT_DATA.user_type,
                    email: CHAT_DATA.email,
                    other_user_id: CHAT_DATA.other_user_id,
                    other_user_type: CHAT_DATA.other_user_type,
                    source: CHAT_DATA.source,
                    thread_id: CHAT_DATA.thread_id,
                };
                $.ajax({
                    url: API_BASE_URL + "chat/message/chat",
                    type: "POST",
                    data: data,
                    success: function (result) {
                        let body = result.body;
                        let messages = body.Messages;
                        $(SELECTOR.messageArea).empty();
                        PAGE_CHAT.checkThreadWritable(body);
                        if (messages.length) {
                            const otherUserId = body.participants.id;
                            $(SELECTOR.chat_other_user_id).attr(
                                "value",
                                otherUserId
                            );
                            PAGE_CHAT.initData();

                            $(SELECTOR.thread_box + ".active")
                                .find(".unread_msg_count")
                                .html(0);
                            PAGE_CHAT.checkUnseenMsgCount();

                            messages.map((item, index) => {
                                const userId = parseInt(CHAT_DATA.user_id);
                                const senderId = parseInt(item.sender.id);
                                if (item.sender) {
                                    console.log(
                                        "001 item.sender.full_name:",
                                        item.sender.full_name
                                    );
                                    const fullName = item.sender.full_name
                                        ? item.sender.full_name
                                        : `${item.sender.first_name} ${item.sender.last_name}`;
                                    console.log("001 fullName:", fullName);
                                    const msg = {
                                        user: fullName,
                                        message: item.message,
                                        created_at: item.created_at,
                                        files: item.files,
                                        index: index,
                                    };
                                    PAGE_CHAT.appendMessage(
                                        msg,
                                        senderId === userId
                                            ? "outgoing"
                                            : "incoming"
                                    );
                                }
                            });
                        }
                        // $("#div1").html(result);
                    },
                });
            },
        },
        thread: {
            foundThread: function () {
                var getCookieChat = GLOBAL.getCookie("chat_data");
                var chatData = JSON.parse(getCookieChat);
                if (getCookieChat && chatData.thread_id) {
                    userId = chatData.user_id;
                    SOCKET_OBJ.connection();
                    $(SELECTOR.guest_chat_form).hide();
                    $(SELECTOR.guest_chat_wrap).show();

                    $('[name="chat_user_id"]').attr("value", userId);
                    $('[name="email"]').attr("value", chatData.email);
                    $('[name="full_name"]').attr("value", chatData.full_name);
                    $('[name="chat_thread_id"]').attr(
                        "value",
                        chatData.thread_id
                    );

                    console.log("chatData::::", chatData);

                    PAGE_CHAT.initData();
                } else {
                    $(SELECTOR.guest_chat_form).show();
                    $(SELECTOR.guest_chat_wrap).hide();
                }
                PAGE_CHAT.thread.initEndThread();
            },
            initEndThread: function () {
                $(SELECTOR.endThreadBtn).on("click", function (e) {
                    e.preventDefault();
                    PAGE_CHAT.thread.endThread();
                });
            },
            endThread: function () {
                $.ajax({
                    url: API_BASE_URL + "chat/end/threads",
                    type: "POST",
                    data: CHAT_DATA,
                    success: function (result) {
                        PAGE_CHAT.sendEndThreadToServer();
                        GLOBAL.removeCookie("chat_data");
                        $(SELECTOR.messageArea).empty();
                        PAGE_CHAT.thread.checkThread();
                        // PAGE_CHAT.thread.listThread();
                        PAGE_CHAT.thread.foundThread();
                        // $("#div1").html(result);
                    },
                });
            },
            checkIsThreadSelected: function (thread) {
                if ($(SELECTOR.thread_list + " .thread_box.active").length) {
                    $(".not-accepted").addClass("d-none");
                } else {
                    $(".not-accepted").removeClass("d-none");
                }
            },
            clickHandlerInit: function () {
                $(SELECTOR.thread_box + " .link").on("click", function (e) {
                    e.preventDefault();
                    var otherUserId = $(this).data("otheruserid"),
                        otherUserType = $(this).data("otherusertype"),
                        threadId = $(this).data("threadid"),
                        reasonCategory = $(this).data("reasoncategory"),
                        reason = $(this).data("reason");
                    $(SELECTOR.chatHeader + " .reason_category").text(
                        reasonCategory
                    );
                    $(SELECTOR.chatHeader + " .reason").text(reason);

                    PAGE_CHAT.thread.updateThread(threadId);

                    $(SELECTOR.thread_list + " .thread_box").removeClass(
                        "active"
                    );
                    $(this).closest(".thread_box").addClass("active");
                    PAGE_CHAT.thread.checkIsThreadSelected();

                    $(SELECTOR.chat_other_user_id).attr("value", otherUserId);
                    $(SELECTOR.other_user_type).attr("value", otherUserType);
                    PAGE_CHAT.initData();
                    PAGE_CHAT.message.loadMessagesByThread(threadId);
                });
            },
            checkThread: function () {
                var activeThread = $(SELECTOR.thread_box + ".active"),
                    threadId = activeThread.data("threadid");
                var getCookieChat = GLOBAL.getCookie("chat_data");
                var chatData = JSON.parse(getCookieChat);

                if (getCookieChat && chatData.thread_id) {
                    $(SELECTOR.endThread).slideDown();
                } else {
                    $(SELECTOR.endThread).slideUp();
                }
            },
            appendThread: function (thread) {
                var reasonCategory = thread.thread_reason_parent;
                var reason = thread.thread_reason;
                var participantsId = thread.participants
                    ? thread.participants.id
                    : "";
                var created_at = thread.last_message
                    ? thread.last_message.created_at
                    : "N/A";
                const department = thread.thread_reason_parent.department;
                $(SELECTOR.thread_list).prepend(`
                    <div class="thread_box link-wrap" data-threadid="${
                        thread.id
                    }">
                        <a href="#" 
                            class="link" 
                            data-reasoncategory="${reasonCategory.reason}" 
                            data-reason="${reason.reason}" 
                            data-threadid="${thread.id}" 
                            data-otheruserid="${participantsId}"
                            data-otherusertype="${thread.other_user_type}"
                            data-department="${department}"
                        ></a>
                        <div class="unread_msg_count">0</div>
                        <h5 class="title regular">
                            <span class="bc1-light f11">${
                                reasonCategory.reason
                            }: </span> 
                            <span class="reason">${reason.reason}</span>
                        </h5>
                        <ul class="meta_info no-list flexbox flex-center">
                            <li class="last_active"><span class="lbl">
                                Last active:</span> ${created_at}
                            </li>
                            ${
                                thread.is_thread_end
                                    ? '<li class="status bold">Completed</li>'
                                    : thread.is_accepted
                                    ? '<li class="status basecolor1 bold">Active</li>'
                                    : '<li class="status color-bright-red bold">Pending</li>'
                            }
                        </ul>
                    </div>
                `);
            },
            listThread: function () {
                var data = {
                    user_id: CHAT_DATA.user_id,
                    user_type: CHAT_DATA.chat_user_type,
                    source: CHAT_DATA.source,
                };
                $.ajax({
                    url: API_BASE_URL + "chat/user/all/threads",
                    type: "POST",
                    data: data,
                    success: function (result) {
                        var threadsList = result.body;
                        if (result.body.length) {
                            $(SELECTOR.thread_list).empty();
                            threadsList.map(function (thread, index) {
                                PAGE_CHAT.thread.appendThread(thread);
                            });
                        } else {
                            $(SELECTOR.thread_list).html(`
                                <div class="hgroup align-center box-style-1 bg-white">
                                    <h6>No ticket found</h6>
                                    <div class="divider center sm"></div>
                                    <p class="small">Having an issue? Please feel free to create a ticket using (+) button above.</p>
                                </div>
                            `);
                        }
                    },
                    complete: function () {
                        PAGE_CHAT.REASONS.changeReasonCategory();
                        PAGE_CHAT.thread.clickHandlerInit();
                        PAGE_CHAT.thread.initEndThread();
                        PAGE_CHAT.checkUnseenMsgCount();
                    },
                });
            },
            updateThread: function (threadId) {
                $(SELECTOR.chat_thread_id).attr("value", threadId);
                PAGE_CHAT.initData();
            },
            createThread: function (msg, name) {
                var data = {
                    user_id: CHAT_DATA.user_id,
                    user_type: CHAT_DATA.user_type,
                    thread_reason_id: thread_reason_id,
                    source: CHAT_DATA.source,
                    email: CHAT_DATA.email,
                    full_name: CHAT_DATA.full_name,
                    other_user_type: CHAT_DATA.other_user_type,
                };
                console.log("data:", data);
                $.ajax({
                    url: API_BASE_URL + "chat/create/threads",
                    type: "POST",
                    data: data,
                    success: function (result) {
                        if (result.status) {
                            const body = result.body;
                            const threadId = body.thread_id;
                            const uId = body.user_id;

                            data["thread_id"] = threadId;
                            data["user_id"] = uId;
                            GLOBAL.setCookie(
                                "chat_data",
                                JSON.stringify(data),
                                1
                            );
                            const department =
                                body.thread_reason_parent.department;
                            PAGE_CHAT.thread.updateThread(threadId);
                            // threadInput.val(threadId);
                            PAGE_CHAT.initData();
                            PAGE_CHAT.thread.foundThread();
                            PAGE_CHAT.thread.updateThreadToOnboarding(
                                department
                            );
                            // Send first message with thread
                            // PAGE_CHAT.sendMessage(msg, name);
                            // PAGE_CHAT.saveMessage();
                            // PAGE_CHAT.thread.listThread();
                            PAGE_CHAT.thread.checkThread();
                            PAGE_CHAT.checkThreadWritable(body);

                            $(".btn-loading").removeClass("btn-loading");
                            $(".form_create_ticket_wrap").removeClass("open");
                        } else {
                            alert(result.message);
                            PAGE_CHAT.initData();
                            PAGE_CHAT.thread.updateThreadToOnboarding();
                            PAGE_CHAT.REASONS.init();
                            // Send first message with thread
                            // PAGE_CHAT.sendMessage(msg, name);
                            // PAGE_CHAT.saveMessage();
                            // PAGE_CHAT.thread.listThread();
                            //PAGE_CHAT.thread.checkThread();
                            $(".btn-loading").removeClass("btn-loading");
                            $(".form_create_ticket_wrap").removeClass("open");
                            $("#ticket_reasons_form").removeClass(
                                "was-validated"
                            );
                        }
                    },
                });
            },
            updateThreadToOnboarding: function (department) {
                const params = {
                    department: department,
                };
                socket.emit("updateThreadToOnboarding", params);
            },
        },
        saveMessage: function (msg) {
            let formData = new FormData();
            formData.append("user_id", CHAT_DATA.user_id);
            formData.append("user_type", CHAT_DATA.user_type);
            formData.append("message", CHAT_DATA.message);
            formData.append("message_type", CHAT_DATA.message_type);
            formData.append("thread_id", CHAT_DATA.thread_id);

            var files = $(SELECTOR.attachFileInput)[0].files;
            if (files.length) {
                for (var i = 0, file; (file = files[i]); i++) {
                    formData.append("files[" + [i] + "]", file);
                }
            }

            $.ajax({
                url: API_BASE_URL + "chat/send/message",
                type: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function (result) {
                    let body = result.body;
                    let msgFiles = body.files;
                    $(SELECTOR.attachFileInput).val("");
                    $(SELECTOR.textMessage).val("");
                    if (msgFiles && msgFiles.length) {
                        msg.files = msgFiles;
                    }
                    var userFullName = "";
                    var sender = result.body.sender;
                    if (sender) {
                        userFullName = sender.full_name
                            ? sender.full_name
                            : `${sender.first_name}  ${sender.last_name}`;
                    }
                    msg.user = userFullName;
                    PAGE_CHAT.appendMessage(msg, "outgoing");
                    $(SELECTOR.chatFiles).empty();
                    PAGE_CHAT.sendMessageToServer(msg);

                    // PAGE_CHAT.appendMessage(msg, 'outgoing');
                    // msg.threadId = GLOBAL.getCookie(COOKIES.threadId);
                    // PAGE_CHAT.sendMessageToServer(msg);
                },
            });
        },
        scrollToBottom: function () {
            var messageArea = $(SELECTOR.messageArea);
            messageArea.stop().animate(
                {
                    scrollTop: messageArea[0].scrollHeight,
                },
                500
            );
        },
        closeChatBox: function () {
            $(SELECTOR.chatWrap).removeClass("opened");
            $(SELECTOR.chatStackedIcon)
                .find(".icofont-close")
                .removeClass("icofont-close")
                .addClass("icofont-chat");
        },
        openChatBox: function () {
            $(SELECTOR.chatWrap).addClass("opened");
            $(SELECTOR.chatStackedIcon)
                .find(".icofont-chat")
                .removeClass("icofont-chat")
                .addClass("icofont-close");
        },
        appendMessage: function (msg, type) {
            console.log("001 msg:::", msg);
            $(SELECTOR.messageArea).append(`
                <div class="chat_box ${type}" data-index="${msg.index}">
                    <div class="inner">
                        <h4 class="name">
                            ${msg.user}
                        </h4>
                        <div class="message">
                            <p>${msg.message}</p>
                            ${
                                msg.files && msg.files.length
                                    ? '<div class="attachments"></div>'
                                    : ""
                            }
                        </div>
                    </div>
                    <div class="created_at">${msg.created_at}</div>
                </div>`);

            var files = msg.files;
            if (files && files.length) {
                files.map(function (file, index) {
                    $(`[data-index="${msg.index}"] .attachments`).append(`
                        <div class="file">
                            <a href="${
                                API_ASSETS + file.file_name
                            }" target="_blank">${file.file_name.replace("public/", "")}</a>
                            <i class="icofont-eye-alt"></i>
                        </div>
                    `);
                });
            }

            $(SELECTOR.textMessage).val("");
            PAGE_CHAT.scrollToBottom();
        },
        sendMessageToServer: function (msg) {
            socket.emit("sendMessage", msg);
        },
        threadUnseenMessageCount: function (threadId) {
            var activeThread = $(
                SELECTOR.thread_box + '[data-threadid="' + threadId + '"]'
            );
            var currentCount = activeThread.find(".unread_msg_count").text();
            var increasedCount = parseInt(currentCount) + 1;
            activeThread.find(".unread_msg_count").html(increasedCount);
            activeThread.find(".unread_msg_count").addClass("animate");
            setTimeout(function () {
                activeThread.find(".unread_msg_count").removeClass("animate");
            }, 3000);
        },
        checkUnseenMsgCount: function () {
            $(SELECTOR.thread_box).each(function () {
                var msgCount = parseInt(
                    $(this).find(".unread_msg_count").html()
                );
                if (!msgCount) {
                    $(this).find(".unread_msg_count").hide();
                } else {
                    $(this).find(".unread_msg_count").show();
                }
            });
        },
        receiveMessageFromServer: function () {
            socket.on("sendReceivedMessage", (msg) => {
                var otherUserId = msg.otherUserId;
                var threadId = msg.threadId;
                $(SELECTOR.chat_other_user_id).attr("value", otherUserId);
                $(SELECTOR.chat_thread_id).attr("value", threadId);

                PAGE_CHAT.initData();

                PAGE_CHAT.appendMessage(msg, "incoming");
                PAGE_CHAT.thread.updateThread(msg.threadId);
                PAGE_CHAT.thread.checkThread();

                PAGE_CHAT.threadUnseenMessageCount(threadId);

                $(
                    SELECTOR.thread_box +
                        '[data-threadid="' +
                        threadId +
                        '"].active'
                )
                    .find(".unread_msg_count")
                    .html(0);
                PAGE_CHAT.checkUnseenMsgCount();
                // PAGE_CHAT.openChatBox();
            });
        },
        sendEndThreadToServer: function () {
            let params = {
                threadId: CHAT_DATA.thread_id,
                userId: CHAT_DATA.other_user_id,
                to: $(SELECTOR.other_user_type).val() + CHAT_DATA.other_user_id,
            };
            PAGE_CHAT.thread.updateThreadToOnboarding();
            socket.emit("endThread", params);
        },
        endThreadFromServer: function () {
            GLOBAL.removeCookie(COOKIES.threadId);
            $(SELECTOR.messageArea).empty();
            PAGE_CHAT.thread.checkThread();
            GLOBAL.removeCookie("chat_data");
            PAGE_CHAT.thread.foundThread();
            const thread = {
                is_accepted: true,
                is_thread_end: true,
            };
            PAGE_CHAT.checkThreadWritable(thread);
        },
        receiveEndThreadStatus: function () {
            socket.on("sendThreadStatus", (params) => {
                PAGE_CHAT.endThreadFromServer(params);
            });
        },
        acceptThreadFromServer: function (params) {
            console.log("00ss02 acceptThreadFromServer", params);
            var selectThreadById = $(
                SELECTOR.thread_box +
                    '[data-threadid="' +
                    params.threadId +
                    '"]'
            );
            selectThreadById
                .find(".link")
                .attr("data-otheruserid", params.otherUserId);
            selectThreadById
                .find(".link")
                .attr("data-otherusertype", params.otherUserType);
            selectThreadById
                .find(".meta_info .status")
                .removeClass("color-bright-red")
                .addClass("basecolor1")
                .html("Active");
            selectThreadById.find(".link").trigger("click");

            $(SELECTOR.chat_other_user_id).attr("value", params.otherUserId);
            PAGE_CHAT.initData();

            // selectThreadById.find('.link').trigger('click');
        },
        receiveAcceptThreadStatus: function () {
            console.log("00ss02 receiveAcceptThreadStatus");
            socket.on("sendAcceptThread", (params) => {
                console.log("sendAcceptThread:::", params);
                PAGE_CHAT.acceptThreadFromServer(params);
                PAGE_CHAT.checkThreadWritable(params.thread);
            });
        },
        sendMessage: function (msg) {
            var textMessageInput = $(SELECTOR.textMessage).val();
            $(SELECTOR.chatMessage).attr("value", textMessageInput);
            PAGE_CHAT.initData();
            if (!GLOBAL.isEmpty(CHAT_DATA.message)) {
                let message = CHAT_DATA.message;
                let date = new Date();
                let formatedDate =
                    date.getFullYear() +
                    "/" +
                    (date.getMonth() + 1) +
                    "/" +
                    date.getDate() +
                    " - " +
                    date.getHours() +
                    ":" +
                    date.getMinutes() +
                    ":" +
                    date.getSeconds();
                // let formatedDate = date.getDate()  + "-" + (date.getMonth()+1) + "-" + date.getFullYear() + " " + date.getHours() + ":" + date.getMinutes();
                var files = $(SELECTOR.attachFileInput)[0].files;
                var activeThread = $(SELECTOR.thread_box + ".active"),
                    threadId = activeThread.data("threadid");
                let msg = {
                    user: CHAT_DATA.full_name,
                    userId: CHAT_DATA.user_id,
                    to:
                        $(SELECTOR.other_user_type).val() +
                        CHAT_DATA.other_user_id,
                    message: message.trim(),
                    threadId: CHAT_DATA.thread_id,
                    created_at: formatedDate,
                };
                PAGE_CHAT.saveMessage(msg);
            }
        },
        init: function () {
            // On chat icon click
            $(SELECTOR.chatStackedIcon).on("click", function () {
                if ($(this).find("i").hasClass("active")) {
                    PAGE_CHAT.closeChatBox();
                } else {
                    PAGE_CHAT.openChatBox();
                }
            });
            $(SELECTOR.chatCloseBtn).on("click", function (e) {
                e.preventDefault();
                PAGE_CHAT.closeChatBox();
            });

            let name = $("#name").text();
            let textarea = $(".textMessageInput");

            $('.guest_chat_form [type="submit"]').on("click", function (e) {
                e.preventDefault();
                $(this).addClass("btn-loading");
                PAGE_CHAT.initData();
                PAGE_CHAT.thread.createThread();
            });

            textarea.on("keyup", (e) => {
                if (e.key === "Enter") {
                    if ($(".textMessageInput").val().trim() != "") {
                        // event.preventDefault();
                        $(SELECTOR.sendMsgBtn).prop("disabled", true);
                        PAGE_CHAT.sendMessage();
                        // if (timeout != null) {
                        //     clearTimeout(timeout);
                        //     timeout = null;
                        // }
                        // timeout = setTimeout(function () {
                        // }, 1000);
                    }
                }
            });

            $(SELECTOR.sendMsgBtn).on("click", function (e) {
                if ($(".textMessageInput").val().trim() != "") {
                    $(SELECTOR.sendMsgBtn).prop("disabled", true);
                    e.preventDefault();
                    PAGE_CHAT.sendMessage();
                }
            });

            PAGE_CHAT.thread.foundThread();
            if (socket) {
                console.log("00ss01 socket connected");
                PAGE_CHAT.receiveMessageFromServer();
                PAGE_CHAT.receiveEndThreadStatus();
                PAGE_CHAT.receiveAcceptThreadStatus();
            }
            PAGE_CHAT.initData();
            var getCookieChat = GLOBAL.getCookie("chat_data");
            var chatData = JSON.parse(getCookieChat);
            if (getCookieChat && chatData.thread_id) {
                PAGE_CHAT.message.loadMessagesByThread();
            }
            // PAGE_CHAT.thread.listThread();
            PAGE_CHAT.thread.checkThread();
            PAGE_CHAT.attachment.init();

            PAGE_CHAT.DROPDOWN.init();
            PAGE_CHAT.REASONS.init();
        },

        // Files attachment
        attachment: {
            attachFileInputChangeInit: function () {
                $(SELECTOR.attachFileInput).on("change", function () {
                    PAGE_CHAT.attachment.attachFileInputChange();
                });
            },
            attachFileInputChange: function () {
                var files = $(SELECTOR.attachFileInput)[0].files;
                for (var i = 0, file; (file = files[i]); i++) {
                    var image = URL.createObjectURL(file);
                    $(SELECTOR.chatFiles).append(`
                        <div class="file" style="background-image: url(${image});">
                        </div>
                    `);
                }
            },
            clickAttachIcon: function () {
                $(SELECTOR.attachFileBtn).on("click", function () {
                    $(SELECTOR.attachFileInput).trigger("click");
                });
            },
            init: function () {
                PAGE_CHAT.attachment.clickAttachIcon();
                PAGE_CHAT.attachment.attachFileInputChangeInit();
            },
        },
    };
    // --------------------- Page Login - [/end]
    PAGE_CHAT.init();
});
