//index.js
//获取应用实例
const app = getApp()

Page({
	data: {
		motto: '赞赏看图',
		hasUserInfo: false,
		userInfo: app.globalData.userInfo,
		canIUse: wx.canIUse('button.open-type.getUserInfo'),
		imgUrls: [
			{ url: 'http://img02.tooopen.com/images/20150928/tooopen_sy_143912755726.jpg', text: '111' },
			{ url: 'http://img06.tooopen.com/images/20160818/tooopen_sy_175866434296.jpg', text: '222' },
			{ url: 'http://img06.tooopen.com/images/20160818/tooopen_sy_175833047715.jpg', text: '789' }
		],
		isSelect1: 'active',
		isSelect2: '',
		isDisplay1: 'block',
		isDisplay2: 'hidden',
		indicatorDots: false,
		autoplay: false,
		interval: 5000,
		duration: 1000,
		pics: [],
		l_id: ''
	},
	changeIndicatorDots: function (e) {
		this.setData({
			indicatorDots: !this.data.indicatorDots
		})
	},
	changeAutoplay: function (e) {
		this.setData({
			autoplay: !this.data.autoplay
		})
	},
	intervalChange: function (e) {
		this.setData({
			interval: e.detail.value
		})
	},
	durationChange: function (e) {
		this.setData({
			duration: e.detail.value
		})
	},
	//事件处理函数
	bindViewTap: function () {
		wx.navigateTo({
			url: '../logs/logs'
		})
	},
	//删除图片
	deleteImg:function(e){
		var idx = e.target.dataset.idx;
		console.log(idx);
		this.data.pics.splice(idx, 1)
		this.setData({
			pics: this.data.pics
		});
	},
	//上傳圖片
	shangchuan: function () {
		var that = this;
		if (that.data.pics.length < 9) {
			wx.chooseImage({
				count: 9 - that.data.pics.length, // 默认9
				sizeType: ['original', 'compressed'], // 可以指定是原图还是压缩图，默认二者都有
				sourceType: ['album', 'camera'], // 可以指定来源是相册还是相机，默认二者都有
				success: function (res) {
					// 返回选定照片的本地文件路径列表，tempFilePath可以作为img标签的src属性显示图片
					var imgsrc = res.tempFilePaths;
					var img = that.data.pics;
					if (img.length == 0) {
						img = imgsrc;
					} else {
						Array.prototype.push.apply(img, imgsrc);
					}
					that.setData({
						pics: img
					});
					//that.uploadimg();
				}
			})
		} else {
			wx.showToast({
				title: '最多9个图片',
				image: '/icon/tip.png',
				duration: 1500
			})
			setTimeout(function () {
				wx.hideToast()
			}, 2000)
		}

	},
	//上传图片方法
	uploadimg: function () {//这里触发图片上传的方法
		var pics = this.data.pics;
		app.uploadimg({
			url: app.globalData.url + '/upload',//这里是你图片上传的接口
			path: pics//这里是选取的图片的地址数组
		});
	},
	//预览图片
	ylimg: function (e) {
		wx.previewImage({
			current: e.target.dataset.src,
			urls: this.data.pics // 需要预览的图片http链接列表
		})
	},
	//提交登錄
	formSubmit: function (e) {
		var that = this;
		if (e.detail.value.beizhu == "") {
			wx.showToast({
				title: '請務必輸入描述',
				image: '/icon/tip.png',
				duration: 1500
			})
			setTimeout(function () {
				wx.hideToast()
			}, 2000)
		} else if (that.data.pics.length < 2) {
			wx.showToast({
				title: '請至少上传俩张图片',
				image: '/icon/tip.png',
				duration: 1500
			})
			setTimeout(function () {
				wx.hideToast()
			}, 2000)
		} else {
			var that = this;
			var pics = that.data.pics;
			var l_id = 0;
			//console.log(pics);
			//表单数据提交到服务器
			app.connect("sendForm.php",
				{
					uid: app.globalData.userInfo.id,
					beizhu: e.detail.value.beizhu,
					nickName: app.globalData.userInfo.nickName,
					avatarUrl: app.globalData.userInfo.avatarUrl

				}, function (e) {
					//上传图片到服务器
					app.uploadimg({
						url: app.globalData.url + "/api/send.php",//这里是你图片上传的接口
						path: pics,//这里是选取的图片的地址数组
						l_id: e,
					});
					wx.redirectTo({
						url: '/pages/send/success?lid=' + e
					})
				});
		}
	},

	onLoad: function () {

	},
	//监控用户下拉动作的	
	onPullDownRefresh: function () {
		console.log(this.data.pics);
	}

})
