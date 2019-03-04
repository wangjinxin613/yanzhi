//index.js
//获取应用实例
const app = getApp();

Page({
	data: {
		motto: '图赏',
		hasUserInfo: true,
		canIUse: wx.canIUse('button.open-type.getUserInfo'),
		imgUrls: [
			{ url: 'http://img02.tooopen.com/images/20150928/tooopen_sy_143912755726.jpg', text: '111' },
			{ url: 'http://img06.tooopen.com/images/20160818/tooopen_sy_175866434296.jpg', text: '222' },
			{ url: 'http://img06.tooopen.com/images/20160818/tooopen_sy_175833047715.jpg', text: '789' }
		],
		userInfo: {},
		indicatorDots: false,
		autoplay: false,
		interval: 5000,
		duration: 1000
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
	onLoad: function () {
		var that = this;
		//userInfo获取
		app.getUserInfo(function (userInfo) {
			//更新数据
			that.setData({
				userInfo: userInfo
			})
		})
	},
	onPullDownRefresh:function(){
		this.onLoad();
		wx.stopPullDownRefresh();
	},
	onShow: function () {
		this.onLoad();

	}
})

