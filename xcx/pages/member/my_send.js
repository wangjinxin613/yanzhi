//index.js
//获取应用实例
const app = getApp()

Page({
	data: {
		motto: '图赏',
		userInfo: {},
		hasUserInfo: false,
		canIUse: wx.canIUse('button.open-type.getUserInfo'),
		imgUrls: [
			{ url: 'http://img02.tooopen.com/images/20150928/tooopen_sy_143912755726.jpg', text: '111' },
			{ url: 'http://img06.tooopen.com/images/20160818/tooopen_sy_175866434296.jpg', text: '222' },
			{ url: 'http://img06.tooopen.com/images/20160818/tooopen_sy_175833047715.jpg', text: '789' }
		],
		indicatorDots: false,
		autoplay: false,
		interval: 5000,
		duration: 1000,
		data_list:{},
		url:""
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
	ylimg: function (e) {
		var that = this;
		console.log(e.target.dataset.src);
		wx.previewImage({
			current: e.target.dataset.src,
			urls: that.data.data_list[e.target.dataset.lid].imgUrl // 需要预览的图片http链接列表
		})
	},
	onLoad: function () {
		var that = this;
		app.getUserInfo(function (userInfo) {
			//更新数据
			that.setData({
				userInfo: userInfo
			})
			app.connect("my_send.php", { uid: app.globalData.userInfo.id }, function (e) {
				that.setData({
					data_list: e.data,
					url: app.globalData.url
				})
				console.log(e)
			})

		})
		
	},
	onPullDownRefresh: function () {
		this.onLoad();
		wx.stopPullDownRefresh();
	}
})

